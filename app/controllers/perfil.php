<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$idUsuario = $_SESSION['id_usuario'];

// Datos del usuario
$sqlUsuario = "
    SELECT id, nombre, correo, creado_en
    FROM usuarios
    WHERE id = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute(['id' => $idUsuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    session_destroy();
    header('Location: /?view=login');
    exit;
}

// Reservaciones del usuario
$sqlReservas = "
    SELECT nombre_cliente, telefono, correo, fecha, hora, zona, creado_en
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC, hora DESC
";

$stmt = $pdo->prepare($sqlReservas);
$stmt->execute(['id' => $idUsuario]);
$reservaciones = $stmt->fetchAll();

require __DIR__ . '/../views/perfil.php';
exit;
