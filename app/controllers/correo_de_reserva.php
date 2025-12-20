<?php
declare(strict_types=1);

/**
 * CORREO DE RESERVA (SIMULADO)
 * - No modifica base de datos
 * - No requiere POST obligatorio
 * - No rompe flujo
 */

// Validar sesión
if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

/*
 | Aquí más adelante puedes:
 | - enviar correo real
 | - usar PHPMailer
 | - consumir API externa
 | Por ahora NO hace nada
*/

header('Location: /?view=reservation-success');
exit;
