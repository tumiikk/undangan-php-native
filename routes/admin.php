<?php
// Rute admin Tahap 2: semua dummy, TANPA autentikasi (autentikasi sungguhan di Tahap 6).
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;

/** @var \App\Core\Router $router */
$dummy = require BASE_PATH . '/app/Config/dummy.php';
$menu = require BASE_PATH . '/app/Config/menu.php';

$page = static function (string $template, array $data = []) use ($dummy, $menu): Response {
    $data += ['dummy' => $dummy, 'menu' => $menu, 'currentPath' => rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/')];
    return Response::html(View::render($template, $data, 'admin/layouts/app'));
};

// --- Login (template desktop & mobile TERPISAH) ---
$router->get('/admin/login', static function () {
    $tpl = is_mobile() ? 'admin/auth/login-mobile' : 'admin/auth/login-desktop';
    return Response::html(View::render($tpl, [
        'title' => 'Masuk Admin',
        'flash' => Session::pullFlash('login_notice'),
    ], 'admin/layouts/auth'))->header('Vary', 'User-Agent');
});

$router->post('/admin/login', static function (Request $r) {
    if (!Session::verifyCsrf($r->input('_token'))) {
        Session::flash('login_notice', ['type' => 'error', 'text' => 'Sesi formulir kedaluwarsa. Muat ulang halaman lalu coba lagi.']);
    } else {
        // Placeholder: autentikasi sungguhan (password_verify, regenerate session) dibuat di Tahap 6.
        Session::flash('login_notice', ['type' => 'info', 'text' => 'Tahap 2: tampilan saja. Autentikasi aktif di Tahap 6.']);
    }
    return Response::redirect('/admin/login');
});

$router->post('/admin/logout', static fn () => Response::redirect('/admin/login'));

// --- Halaman jadi ---
$router->get('/admin', static fn () => Response::redirect('/admin/dashboard'));
$router->get('/admin/dashboard', static fn () => $page('admin/pages/dashboard', ['title' => 'Dashboard', 'subtitle' => 'Ringkasan undangan']));
$router->get('/admin/design-system', static fn () => $page('admin/pages/design-system', ['title' => 'Design System', 'subtitle' => 'Katalog komponen dan token']));
$router->get('/admin/konten', static fn () => Response::redirect('/admin/konten/cover'));

// --- Placeholder rapi untuk semua item menu yang belum dibuat ---
$register = static function (array $items) use (&$register, $router, $page): void {
    foreach ($items as $item) {
        if (!empty($item['children'])) {
            $register($item['children']);
            continue;
        }
        if (!empty($item['ready'])) {
            continue;
        }
        $router->get($item['href'], static fn () => $page('admin/pages/placeholder', [
            'title' => $item['label'],
            'subtitle' => !empty($item['soon']) ? 'Segera hadir' : 'Belum tersedia',
            'item' => $item,
        ]));
    }
};
$register($menu);
