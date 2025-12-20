<?php
declare(strict_types=1);

/**
 * ============================
 * MAPA DE VISTAS (GET)
 * ============================
 * ?view=xxxx
 */
$viewsMap = [
    'login'                    => __DIR__ . '/views/auth/login.php',
    'register'                 => __DIR__ . '/views/auth/register.html',
    'recover'                  => __DIR__ . '/views/auth/recover-password.html',
    'recover-password-success' => __DIR__ . '/views/auth/recover-password-success.html',
    'successful_registration'  => __DIR__ . '/views/auth/successful_registration.html',
    'home'                     => __DIR__ . '/views/home.html',
    'menu'                     => __DIR__ . '/views/menu.html',
];

    
/**
 * MAPA DE ACCIONES (POST)
 * ============================
 * ?action=xxxx
 */

    
;$actionsMap = [
    'login_submit' => __DIR__ . '/controllers/login.php',
    'register'     => __DIR__ . '/controllers/registro.php',
    'recover'      => __DIR__ . '/controllers/recuperar_contrasena.php',
    'logout'       => __DIR__ . '/controllers/cerrar_sesion.php',

    // dinámicos
    'perfil'       => __DIR__ . '/controllers/perfil.php',
    'reservaciones'=> __DIR__ . '/controllers/reservaciones.php',
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

    // Acción no encontrada
    header('Location: /?view=login');
    exit;
}

// Vista (GET)
$view = $_GET['view'] ?? 'login';

if (isset($viewsMap[$view])) {
    require $viewsMap[$view];
    exit;
}

// Vista no encontrada
header('Location: /?view=login');
exit;
