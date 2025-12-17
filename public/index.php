<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$view = $_GET['view'] ?? 'login';

$routes = [
    // Vistas
    'login'    => __DIR__ . '/../app/views/auth/login.php',
    'register' => __DIR__ . '/../app/views/auth/register.html',
    'recover'  => __DIR__ . '/../app/views/auth/recover-password.html',
    'recover-password-success' => __DIR__ . '/../app/views/auth/recover-password-success.html',
    'menu'     => __DIR__ . '/../app/views/menu.html',
    'home'     => __DIR__ . '/../app/views/home.html',
    'beers'    => __DIR__ . '/../app/views/beers.html',
    'bottles'  => __DIR__ . '/../app/views/bottles.html',
    'extras'   => __DIR__ . '/../app/views/extras.html',
    'food'     => __DIR__ . '/../app/views/food.html',
    'micheladas' => __DIR__ . '/../app/views/micheladas.html',
    'tacos'    => __DIR__ . '/../app/views/tacos.html',
    'reservation-success' => __DIR__ . '/../app/views/reservation-success.html',
    'successful_registration' => __DIR__ . '/../app/views/successful_registration.html',
    'email-already-registered' => __DIR__ . '/../app/views/email-already-registered.html',
    'incorrect-password' => __DIR__ . '/../app/views/incorrect-password.html',
    // Controladores
    'registro' => __DIR__ . '/../app/controllers/registro.php',
    'recuperar_contrasena' => __DIR__ . '/../app/controllers/recuperar_contrasena.php',
    'recuperacion_de_contraseña' => __DIR__ . '/../app/controllers/recuperacion_de_contrase+¦a.php',
    'reservaciones' => __DIR__ . '/../app/controllers/reservaciones.php',
    'realizar_reserva' => __DIR__ . '/../app/controllers/realizar_reserva.php',
    'perfil' => __DIR__ . '/../app/controllers/perfil.php',
    'cerrar_sesion' => __DIR__ . '/../app/controllers/cerrar_sesion.php',
    'correo_de_reserva' => __DIR__ . '/../app/controllers/correo_de_reserva.php',
];

if (!array_key_exists($view, $routes)) {
    http_response_code(404);
    echo 'Página no encontrada';
    exit;
}

require $routes[$view];
