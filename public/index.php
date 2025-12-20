<?php
declare(strict_types=1);

/**
 * ======================================
 * FRONT CONTROLLER ÚNICO
 * ======================================
 * - Inicia sesión
 * - Carga el router central
 * - NO contiene lógica de rutas
 * - NO valida sesión
 */

session_start();

// Autoload (si usas Composer)
$autoload = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

// Router central
require __DIR__ . '/../app/routes.php';