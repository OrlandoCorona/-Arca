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
 * DATOS DEL USUARIO
 * ============================
 */
$sqlUsuario = "
    SELECT nombre, correo
    FROM usuarios
    WHERE id = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute(['id' => $id_usuario]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    session_destroy();
    header('Location: /?view=login');
    exit;
}

/**
 * ============================
 * RESERVACIONES DEL USUARIO
 * ============================
 */
$sqlReservas = "
    SELECT fecha, hora, zona
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC
";

$stmt = $pdo->prepare($sqlReservas);
$stmt->execute(['id' => $id_usuario]);
$reservaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

/**
 * ============================
 * CARGAR VISTA
 * ============================
 */
require __DIR__ . '/../views/perfil.php';
exit;
