<?php
session_start();

/**
 * DEMO SESSION — SOLO PARA PRUEBAS VISUALES
 * QUITAR ANTES DE PRODUCCIÓN
 */
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = [
        'id_usuario' => 1,
        'nombre' => 'Demo',
        'correo' => 'demo@local.test'
    ];
}

require __DIR__ . '/../app/routes.php';
