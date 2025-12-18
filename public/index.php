<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Vista solicitada
|--------------------------------------------------------------------------
*/
$view = $_GET['view'] ?? 'login';

/*
|--------------------------------------------------------------------------
| Router
|--------------------------------------------------------------------------
*/
$routes = [

    // AUTH
    'login'   => __DIR__ . '/../app/views/auth/login.php',
    'register' => __DIR__ . '/../app/views/auth/register.html',
    'recover' => __DIR__ . '/../app/views/auth/recover-password.html',
    'recover-password-success' => __DIR__ . '/../app/views/auth/recover-password-success.html',

    // VISTAS
    'home'   => __DIR__ . '/../app/views/home.html',
    'menu'   => __DIR__ . '/../app/views/menu.html',
    'beers'  => __DIR__ . '/../app/views/beers.html',
    'bottles' => __DIR__ . '/../app/views/bottles.html',
    'extras' => __DIR__ . '/../app/views/extras.html',
    'food'   => __DIR__ . '/../app/views/food.html',
    'micheladas' => __DIR__ . '/../app/views/micheladas.html',
    'tacos'  => __DIR__ . '/../app/views/tacos.html',

    // MENSAJES
    'reservation-success' => __DIR__ . '/../app/views/reservation-success.html',
    'successful_registration' => __DIR__ . '/../app/views/successful_registration.html',
    'email-already-registered' => __DIR__ . '/../app/views/email-already-registered.html',
    'incorrect-password' => __DIR__ . '/../app/views/incorrect-password.html',

    // CONTROLADORES
    'login_submit' => __DIR__ . '/../app/controllers/login.php',
    'registro' => __DIR__ . '/../app/controllers/registro.php',
    'recuperar_contrasena' => __DIR__ . '/../app/controllers/recuperar_contrasena.php',
    'reservaciones' => __DIR__ . '/../app/controllers/reservaciones.php',
    'realizar_reserva' => __DIR__ . '/../app/controllers/realizar_reserva.php',
    'perfil' => __DIR__ . '/../app/controllers/perfil.php',
    'cerrar_sesion' => __DIR__ . '/../app/controllers/cerrar_sesion.php',
];

/*
|--------------------------------------------------------------------------
| Validación de vista
|--------------------------------------------------------------------------
*/
if (!isset($routes[$view])) {
    http_response_code(404);
    echo 'Vista no encontrada';
    exit;
}

$route = $routes[$view];

/*
|--------------------------------------------------------------------------
| Carga final
|--------------------------------------------------------------------------
*/
require $route;
exit;
