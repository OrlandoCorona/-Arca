<?php
session_start();

require __DIR__ . '/../app/routes.php';

$view   = $_GET['view']   ?? null;
$action = $_GET['action'] ?? null;

/*
|--------------------------------------------------------------------------
| ACCIONES (POST)
|--------------------------------------------------------------------------
*/
if ($action) {
    $actions = [
        'login',
        'register',
        'recover',
        'logout'
    ];

    if (!in_array($action, $actions, true)) {
        http_response_code(404);
        exit('Acción no válida');
    }

    require $actionsMap[$action];
    exit;
}

/*
|--------------------------------------------------------------------------
| VISTAS (GET)
|--------------------------------------------------------------------------
*/
$publicViews = [
    'login',
    'register',
    'recover',
    'successful_registration',
    'recover-password-success',
    'incorrect-password',
    'email-already-registered'
];

if (!$view) {
    $view = 'login';
}

if (!isset($_SESSION['id_usuario']) && !in_array($view, $publicViews, true)) {
    header('Location: /?view=login');
    exit;
}

require $viewsMap[$view] ?? exit('Vista no encontrada');
