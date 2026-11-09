<?php
declare(strict_types=1);

namespace App\Core;

/** Router minimal: GET/POST, parameter {nama}, closure atau [Class, 'method']. */
final class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    private function add(string $method, string $path, callable|array $handler): void
    {
        $regex = preg_replace('#\{([a-zA-Z_]+)\}#', '(?P<$1>[^/]+)', rtrim($path, '/') ?: '/');
        $this->routes[$method][] = ['#^' . $regex . '$#', $handler];
    }

    public function dispatch(Request $request): Response
    {
        $path = rtrim($request->path, '/') ?: '/';
        foreach ($this->routes[$request->method] ?? [] as [$regex, $handler]) {
            if (preg_match($regex, $path, $m)) {
                $params = array_filter($m, 'is_string', ARRAY_FILTER_USE_KEY);
                if (is_array($handler)) {
                    $handler = [new $handler[0](), $handler[1]];
                }
                $result = $handler($request, ...array_values($params));
                return $result instanceof Response ? $result : Response::html((string) $result);
            }
        }
        return Response::html(View::render('errors/404', ['title' => 'Halaman tidak ditemukan']), 404);
    }
}
