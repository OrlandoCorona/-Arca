<?php
declare(strict_types=1);

/**
 * ============================
 * MAPA DE VISTAS PÚBLICAS (GET)
 * ============================
 * Estas vistas NO validan sesión
 * Solo muestran contenido
 */
$viewsMap = [

    // Auth
    'login' => __DIR__ . '/views/login.php',
    'register' => __DIR__ . '/views/auth/register.php',
    'recover' => __DIR__ . '/views/auth/recover-password.php',
    'recover-password-success' => __DIR__ . '/views/auth/recover-password-success.php',
    'successful_registration' => __DIR__ . '/views/successful_registration.php',
    'incorrect-password' => __DIR__ . '/views/incorrect-password.php',
    'email-already-registered' => __DIR__ . '/views/email-already-registered.php',

    // Públicas
    'menu' => __DIR__ . '/views/menu.php',
    'beers' => __DIR__ . '/views/beers.php',
    'food' => __DIR__ . '/views/food.php',
    'tacos' => __DIR__ . '/views/tacos.php',
    'micheladas' => __DIR__ . '/views/micheladas.php',
    'bottles' => __DIR__ . '/views/bottles.php',
    'extras' => __DIR__ . '/views/extras.php',
    'reservation-success' => __DIR__ . '/views/reservation-success.php',

];

/**
 * ============================
 * MAPA DE ACCIONES (POST)
 * ============================
 * Estas rutas ejecutan lógica
 */
$actionsMap = [
    'login' => __DIR__ . '/controllers/login.php',
    'register' => __DIR__ . '/controllers/registro.php',
    'recover' => __DIR__ . '/controllers/recuperar_contrasena.php',
    'logout' => __DIR__ . '/controllers/cerrar_sesion.php',
    'realizar_reserva' => __DIR__ . '/controllers/realizar_reserva.php',
];

/**
 * ============================
 * ROUTER CENTRAL
 * ============================
 */

/**
 * ----------------------------
 * ACCIONES (POST)
 * ----------------------------
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {

    $action = $_GET['action'];

    if (!isset($actionsMap[$action])) {
        http_response_code(404);
        exit('Acción no encontrada');
    }

    // Ejecuta el controlador
    require $actionsMap[$action];

    /**
     * IMPORTANTE:
     * Un POST nunca debe continuar al router GET
     * El controlador DEBE redirigir y terminar.
     */
    exit;
}

/**
 * ----------------------------
 * PÁGINAS PROTEGIDAS (GET)
 * ----------------------------
 * Aquí SÍ se valida sesión
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $view = $_GET['view'] ?? 'login';


    if ($view === 'perfil') {
        require __DIR__ . '/controllers/perfil.php';
        exit;
    }

    if ($view === 'reservaciones') {
        require __DIR__ . '/controllers/reservaciones.php';
        exit;
    }
    if ($view === 'home') {
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: /?view=login');
            exit;
        }
        require __DIR__ . '/views/home.php';
        exit;
    }

    /**
     * ----------------------------
     * VISTAS PÚBLICAS (GET)
     * ----------------------------
     */
    if (isset($viewsMap[$view])) {
        require $viewsMap[$view];
        exit;
    }
}

/**
 * ----------------------------
 * FALLBACK SEGURO
 * ----------------------------
 */
header('Location: /?view=login');
exit;
