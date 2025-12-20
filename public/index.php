<?php
declare(strict_types=1);

/**
 * Front Controller
 * - Inicia sesión
 * - Delega TODO el control a routes.php
 */

session_start();

require __DIR__ . '/../app/routes.php';
