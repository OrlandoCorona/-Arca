<?php
declare(strict_types=1);


require __DIR__ . '/../vendor/autoload.php';

session_start();

/*
|--------------------------------------------------------------------------
| Vista solicitada
|--------------------------------------------------------------------------
*/
$view = $_GET['view'] ?? 'login';

/*
|--------------------------------------------------------------------------
| Vistas públicas (no requieren sesión)
|--------------------------------------------------------------------------
*/
$publicViews = [
    'login',
    'register',
    'recover',
    'recover-password-success'
];

/*
|--------------------------------------------------------------------------
| Protección de vistas privadas
|--------------------------------------------------------------------------
| Si NO hay sesión y la vista no es pública,
| se redirige siempre al login
*/
if (!in_array($view, $publicViews, true) && !isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

/*
|--------------------------------------------------------------------------
| Router central
|--------------------------------------------------------------------------
| SOLO vistas y controladores permitidos
*/
$routes = [

    // ──────────────── AUTH ────────────────
    'login' => function () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . '/../app/controllers/login.php';
        } else {
            require __DIR__ . '/../app/views/auth/login.php';
        }
    },

    'register' => __DIR__ . '/../app/views/auth/register.html',
    'recover' => __DIR__ . '/../app/views/auth/recover-password.html',
    'recover-password-success' => __DIR__ . '/../app/views/auth/recover-password-success.html',

    // ──────────────── VISTAS PRINCIPALES ────────────────
    'home' => __DIR__ . '/../app/views/home.html',
    'menu' => __DIR__ . '/../app/views/menu.html',
    'beers' => __DIR__ . '/../app/views/beers.html',
    'bottles' => __DIR__ . '/../app/views/bottles.html',
    'extras' => __DIR__ . '/../app/views/extras.html',
    'food' => __DIR__ . '/../app/views/food.html',
    'micheladas' => __DIR__ . '/../app/views/micheladas.html',
    'tacos' => __DIR__ . '/../app/views/tacos.html',

    // ──────────────── RESULTADOS / MENSAJES ────────────────
    'reservation-success' => __DIR__ . '/../app/views/reservation-success.html',
    'successful_registration' => __DIR__ . '/../app/views/successful_registration.html',
    'email-already-registered' => __DIR__ . '/../app/views/email-already-registered.html',
    'incorrect-password' => __DIR__ . '/../app/views/incorrect-password.html',

    // ──────────────── CONTROLADORES ────────────────
    'registro' => __DIR__ . '/../app/controllers/registro.php',
    'recuperar_contrasena' => __DIR__ . '/../app/controllers/recuperar_contrasena.php',
    'reservaciones' => __DIR__ . '/../app/controllers/reservaciones.php',
    'realizar_reserva' => __DIR__ . '/../app/controllers/realizar_reserva.php',
    'correo_de_reserva' => __DIR__ . '/../app/controllers/correo_de_reserva.php',
    'perfil' => __DIR__ . '/../app/controllers/perfil.php',
    'cerrar_sesion' => __DIR__ . '/../app/controllers/cerrar_sesion.php',
];


/*
|--------------------------------------------------------------------------
| Validación de ruta
|--------------------------------------------------------------------------
*/
if (!array_key_exists($view, $routes)) {
    http_response_code(404);
    echo 'Página no encontrada';
    exit;
}

/*
|--------------------------------------------------------------------------
| Carga final
|--------------------------------------------------------------------------
*/
require $routes[$view];
