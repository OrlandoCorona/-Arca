<?php
declare(strict_types=1);

/**
 * ============================
 * VALIDAR SESIÓN
 * ============================
 */
if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$id_usuario = (int) $_SESSION['id_usuario'];

/**
 * ============================
 * OBTENER RESERVACIONES
 * ============================
 */
$sql = "
    SELECT nombre_cliente, telefono, correo, fecha, hora, zona, creado_en
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id_usuario]);
$reservaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

/**
 * ============================
 * CARGAR VISTA
 * ============================
 */
require __DIR__ . '/../views/reservaciones.php';
exit;
