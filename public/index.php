<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$view = $_GET['view'] ?? 'login';

$routes = [

    // AUTH
    'login'                    => __DIR__ . '/../app/views/auth/login.php',
    'register'                 => __DIR__ . '/../app/views/auth/register.html',
    'recover-password'         => __DIR__ . '/../app/views/auth/recover-password.html',
    'recover-password-success' => __DIR__ . '/../app/views/auth/recover-password-success.html',

    // CORE
    'home'     => __DIR__ . '/../app/views/home.html',
    'menu'     => __DIR__ . '/../app/views/menu.html',

    // MENU SECTIONS
    'beers'       => __DIR__ . '/../app/views/beers.html',
    'bottles'     => __DIR__ . '/../app/views/bottles.html',
    'food'        => __DIR__ . '/../app/views/food.html',
    'tacos'       => __DIR__ . '/../app/views/tacos.html',
    'micheladas'  => __DIR__ . '/../app/views/micheladas.html',
    'extras'      => __DIR__ . '/../app/views/extras.html',

    // STATUS / FEEDBACK
    'incorrect-password'       => __DIR__ . '/../app/views/incorrect-password.html',
    'email-already-registered' => __DIR__ . '/../app/views/email-already-registered.html',
    'reservation-success'      => __DIR__ . '/../app/views/reservation-success.html',
    'registration-success'     => __DIR__ . '/../app/views/successful_registration.html',
];

if (!array_key_exists($view, $routes)) {
    http_response_code(404);
    echo 'Página no encontrada';
    exit;
}

require $routes[$view];
