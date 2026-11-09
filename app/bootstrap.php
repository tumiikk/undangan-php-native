<?php
declare(strict_types=1);

use App\Core\Env;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;

define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(static function (string $class): void {
    if (str_starts_with($class, 'App\\')) {
        $file = BASE_PATH . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
        if (is_file($file)) {
            require $file;
        }
    }
});

Env::load(BASE_PATH . '/.env');
require BASE_PATH . '/app/Helpers/functions.php';

$debug = Env::bool('APP_DEBUG', false);
ini_set('display_errors', $debug ? '1' : '0');
error_reporting(E_ALL);
date_default_timezone_set(Env::get('APP_TIMEZONE', 'Asia/Jakarta'));

set_exception_handler(static function (Throwable $e) use ($debug): void {
    // Detail hanya di log; pengunjung tidak melihat jejak error (kecuali APP_DEBUG=true).
    @error_log('[' . date('c') . '] ' . $e . PHP_EOL, 3, BASE_PATH . '/storage/logs/app.log');
    try {
        $html = View::render('errors/500', ['title' => 'Terjadi kesalahan', 'detail' => $debug ? (string) $e : null]);
    } catch (Throwable) {
        $html = 'Terjadi kesalahan pada server.';
    }
    Response::html($html, 500)->send();
});

Session::start();
