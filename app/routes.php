<?php

$routes = [

    // ───────── AUTH ─────────
    'login' => __DIR__ . '/views/auth/login.php',
    'register' => __DIR__ . '/views/auth/register.html',
    'recover' => __DIR__ . '/views/auth/recover-password.html',
    'recover-password-success' => __DIR__ . '/views/auth/recover-password-success.html',

    // ───────── VISTAS ─────────
    'home' => __DIR__ . '/views/home.html',
    'menu' => __DIR__ . '/views/menu.html',
    'beers' => __DIR__ . '/views/beers.html',
    'bottles' => __DIR__ . '/views/bottles.html',
    'food' => __DIR__ . '/views/food.html',
    'tacos' => __DIR__ . '/views/tacos.html',
    'extras' => __DIR__ . '/views/extras.html',
    'micheladas' => __DIR__ . '/views/micheladas.html',

    // ───────── RESULTADOS ─────────
    'reservation-success' => __DIR__ . '/views/reservation-success.html',
    'successful_registration' => __DIR__ . '/views/successful_registration.html',
    'email-already-registered' => __DIR__ . '/views/email-already-registered.html',
    'incorrect-password' => __DIR__ . '/views/incorrect-password.html',

    // ───────── CONTROLADORES ─────────
    /*
|--------------------------------------------------------------------------
| CONTROLLERS (acciones / vistas protegidas)
|--------------------------------------------------------------------------
*/
'login_submit'        => __DIR__ . '/controllers/login.php',
'registro'            => __DIR__ . '/controllers/registro.php',
'recuperar_contrasena'=> __DIR__ . '/controllers/recuperar_contrasena.php',
'realizar_reserva'    => __DIR__ . '/controllers/realizar_reserva.php',
'reservaciones'       => __DIR__ . '/controllers/reservaciones.php',
'perfil'              => __DIR__ . '/controllers/perfil.php',
'cerrar_sesion'       => __DIR__ . '/controllers/cerrar_sesion.php',

];
