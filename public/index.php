<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/routes.php';

$routeKey = $_GET['view'] ?? 'login';

/*
|--------------------------------------------------------------------------
| Rutas públicas (NO requieren sesión)
|--------------------------------------------------------------------------
*/
$publicRoutes = [
    'login',
    'login_submit',
    'register',
    'recover',
    'recuperar_contrasena',
    'recover-password-success',
    'successful_registration',
    'email-already-registered',
    'incorrect-password'
];

/*
|--------------------------------------------------------------------------
| Protección de rutas privadas
|--------------------------------------------------------------------------
*/
if (!in_array($routeKey, $publicRoutes, true) && !isset($_SESSION['Usuario_id'])) {
    header('Location: /?view=login');
    exit;
}

/*
|--------------------------------------------------------------------------
| Validar ruta
|--------------------------------------------------------------------------
*/
if (!isset($routes[$routeKey])) {
    http_response_code(404);
    echo 'Vista no encontrada';
    exit;
}

require $routes[$routeKey];
exit;
