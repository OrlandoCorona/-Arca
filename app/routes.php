<?php

$viewsMap = [
    'login'                     => __DIR__ . '/views/auth/login.php',
    'register'                  => __DIR__ . '/views/auth/register.html',
    'recover'                   => __DIR__ . '/views/auth/recover-password.html',
    'successful_registration'   => __DIR__ . '/views/auth/successful_registration.html',
    'recover-password-success'  => __DIR__ . '/views/auth/recover-password-success.html',
    'incorrect-password'        => __DIR__ . '/views/incorrect-password.html',
    'email-already-registered'  => __DIR__ . '/views/email-already-registered.html',
    'home'                      => __DIR__ . '/views/home.html',
];

$actionsMap = [
    'login'    => __DIR__ . '/controllers/login.php',
    'register' => __DIR__ . '/controllers/registro.php',
    'recover'  => __DIR__ . '/controllers/recuperar_contrasena.php',
    'logout'   => __DIR__ . '/controllers/cerrar_sesion.php',
];
