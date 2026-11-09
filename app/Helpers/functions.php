<?php
declare(strict_types=1);

use App\Core\Session;
use App\Core\View;

/** Escape output (XSS). Wajib untuk semua data di template. */
function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function url(string $path = ''): string
{
    return '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    $file = BASE_PATH . '/public/assets/' . ltrim($path, '/');
    $v = is_file($file) ? '?v=' . filemtime($file) : '';
    return '/assets/' . ltrim($path, '/') . $v;
}

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(Session::csrfToken()) . '">';
}

/** Render komponen dari app/Views/admin/components/{name}.php */
function component(string $name, array $props = []): string
{
    return View::partial('admin/components/' . $name, $props);
}

/**
 * Deteksi perangkat (sementara, hanya untuk Login admin yang memang beda desktop/mobile).
 * User-Agent di server + override ?view=desktop|mobile. Keputusan final untuk landing ada di Tahap 5.
 */
function is_mobile(): bool
{
    $force = $_GET['view'] ?? null;
    if ($force === 'mobile') {
        return true;
    }
    if ($force === 'desktop') {
        return false;
    }
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    return (bool) preg_match('/Android|iPhone|iPod|Windows Phone|Mobile|BlackBerry|Opera Mini/i', $ua);
}

function is_active_path(string $current, string $href, bool $exact = false): bool
{
    $current = rtrim($current, '/') ?: '/';
    $href = rtrim($href, '/') ?: '/';
    return $exact ? $current === $href : ($current === $href || str_starts_with($current, $href . '/'));
}

/** Ikon garis (SVG inline, stroke=currentColor). */
function icon(string $name, string $class = 'h-5 w-5'): string
{
    static $paths = null;
    $paths ??= require BASE_PATH . '/app/Config/icons.php';
    $d = $paths[$name] ?? $paths['dot'];
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $d . '</svg>';
}
