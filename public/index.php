<?php
declare(strict_types=1);

/**
 * Front Controller
 */
session_start();

require __DIR__ . '/../app/routes.php';

/**
 * Detectar acción o vista
 */
$action = $_GET['action'] ?? null;
$view   = $_GET['view'] ?? null;

/**
 * Acciones (POST)
 */
if ($action && isset($actionsMap[$action])) {
    require $actionsMap[$action];
    exit;
}

/**
 * Vistas (GET)
 */
if ($view && isset($viewsMap[$view])) {
    require $viewsMap[$view];
    exit;
}

/**
 * Default
 */
require $viewsMap['login'];
exit;
