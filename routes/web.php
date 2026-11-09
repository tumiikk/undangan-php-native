<?php
// Rute publik. Landing undangan (/ dan /undangan/{token}) dikerjakan di Tahap 5–6.
use App\Core\Response;

/** @var \App\Core\Router $router */
$router->get('/', static fn () => Response::redirect('/admin/login'));
