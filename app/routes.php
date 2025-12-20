<?php
declare(strict_types=1);

/**
 * ============================
 * MAPA DE VISTAS (GET)
 * ============================
 * ?view=xxxx
 */
$viewsMap = [
    'login'                     => __DIR__ . '/views/auth/login.php',
    'register'                  => __DIR__ . '/views/auth/register.html',
    'recover'                   => __DIR__ . '/views/auth/recover-password.html',
    'recover-password-success'  => __DIR__ . '/views/auth/recover-password-success.html',
    'successful_registration'   => __DIR__ . '/views/auth/successful_registration.html',
    'incorrect-password'        => __DIR__ . '/views/incorrect-password.html',
    'email-already-registered'  => __DIR__ . '/views/email-already-registered.html',

    // App
    'home'          => __DIR__ . '/views/home.html',
    'menu'          => __DIR__ . '/views/menu.html',
    'reservaciones' => __DIR__ . '/views/reservaciones.php',

   
    // otras vistas públicas
    'home' => __DIR__ . '/views/home.html',
    'menu' => __DIR__ . '/views/menu.html',
];

    
/**
 * MAPA DE ACCIONES (POST)
 * ============================
 * ?action=xxxx
 */

    
;$actionsMap = [
    'login'      => __DIR__ . '/controllers/login.php',
    'register'          => __DIR__ . '/controllers/registro.php',
    'recover'           => __DIR__ . '/controllers/recuperar_contrasena.php',
    'logout'            => __DIR__ . '/controllers/cerrar_sesion.php',
    'realizar_reserva'  => __DIR__ . '/controllers/realizar_reserva.php',
];
/**
 * ============================
 * ROUTER CENTRAL
 * ============================
 */

// Acción (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    $action = $_GET['action'];

    if (isset($actionsMap[$action])) {
        require $actionsMap[$action];
        exit;
    }

    http_response_code(404);
    exit('Acción no encontrada');
}

$view = $_GET['view'] ?? 'login';

if (isset($viewsMap[$view])) {
    require $viewsMap[$view];
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && ($_GET['view'] ?? '') === 'perfil') {
    require __DIR__ . '/controllers/perfil.php';
    exit;
}

// Vista no encontrada → redirigir limpiamente
header('Location: /?view=login');
exit;