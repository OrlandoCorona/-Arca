<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';

$view = $_GET['view'] ?? 'home';

if (!isset($routes[$view])) {
    http_response_code(404);
    echo 'Vista no encontrada';
    exit;
}

$route = $routes[$view];

/**
 * SI ES UN CONTROLADOR (Closure)
 */
if (is_callable($route)) {
    $route();
    exit;
}

/**
 * SI ES UNA VISTA (string con ruta a archivo)
 */
if (is_string($route)) {
    require $route;
    exit;
}

/**
 * FALLBACK DE SEGURIDAD
 */
http_response_code(500);
echo 'Ruta mal configurada';
exit;
