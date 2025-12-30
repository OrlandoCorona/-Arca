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
 * Router central
 */
require __DIR__ . '/../app/routes.php';
