<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$view = $_GET['view'] ?? 'login';

$routes = [
    'login'    => __DIR__ . '/../app/views/auth/login.php',
    'register' => __DIR__ . '/../app/views/auth/register.html',
    'recover'  => __DIR__ . '/../app/views/auth/recover-password.html',
    'menu'     => __DIR__ . '/../app/views/menu.html',
];

if (!array_key_exists($view, $routes)) {
    http_response_code(404);
    echo 'Página no encontrada';
    exit;
}

require $routes[$view];
