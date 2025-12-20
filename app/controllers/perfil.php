<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$id_usuario = $_SESSION['id_usuario'];

// Datos del usuario
$sqlUsuario = "
    SELECT nombre, correo
    FROM usuarios
    WHERE id = :id
";
$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute(['id' => $id_usuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    header('Location: /?view=login');
    exit;
}

// Reservaciones
$sqlReservas = "
    SELECT fecha, hora, zona
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC
";
$stmt = $pdo->prepare($sqlReservas);
$stmt->execute(['id' => $id_usuario]);
$reservaciones = $stmt->fetchAll();

require __DIR__ . '/../views/perfil.php';
exit;
