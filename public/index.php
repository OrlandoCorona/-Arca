<?php
declare(strict_types=1);

/**
 * ======================================
 * FRONT CONTROLLER ÚNICO
 * ======================================
 * - Inicia sesión
 * - Carga Composer (si existe)
 * - Carga el router central
 * - NO contiene lógica de negocio
 */

session_start();
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = 1;
    $_SESSION['nombre'] = 'Demo';
    $_SESSION['correo'] = 'demo@local.test';
}


/**
 * Router central
 */
require __DIR__ . '/../app/routes.php';
