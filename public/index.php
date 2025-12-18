<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/routes.php';

$view = $_GET['view'] ?? 'login';

if (!isset($routes[$view])) {
    http_response_code(404);
    echo 'Vista no encontrada';
    exit;
}

$route = $routes[$view];

if (is_callable($route)) {
    $route();
    exit;
}

if (is_string($route)) {
    require $route;
    exit;
}

http_response_code(500);
echo 'Ruta mal configurada';
exit;
