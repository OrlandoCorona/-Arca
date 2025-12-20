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

/**
 * Autoload de Composer (si existe)
 */
$autoload = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

/**
 * Router central
 */
require __DIR__ . '/../app/routes.php';
