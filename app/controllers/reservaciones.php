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
    SELECT
        r.fecha,
        r.hora,
        r.zona,
        r.creado_en
    FROM reservaciones r
    WHERE r.id_usuario = :id
    ORDER BY r.fecha DESC, r.hora DESC
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
