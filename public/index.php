<?php
declare(strict_types=1);

// Front controller: satu-satunya pintu masuk. Kode aplikasi berada di luar public/.

// Hanya untuk `php -S` (pengembangan tanpa Apache): sajikan file statis apa adanya.
if (PHP_SAPI === 'cli-server') {
    $f = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($f) && !str_ends_with($f, '.php')) {
        return false;
    }
}

require dirname(__DIR__) . '/app/bootstrap.php';

use App\Core\Request;
use App\Core\Router;

$router = new Router();
require BASE_PATH . '/routes/web.php';
require BASE_PATH . '/routes/admin.php';

$router->dispatch(Request::capture())->send();
