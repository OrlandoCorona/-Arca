<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

$idUsuario = $_SESSION['id_usuario'];

$stmt = $pdo->prepare("
    SELECT nombre, correo
    FROM usuarios
    WHERE id_usuario = :id
    LIMIT 1
");
$stmt->execute(['id' => $idUsuario]);
$usuario = $stmt->fetch();

$stmt = $pdo->prepare("
    SELECT fecha, hora, zona
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC
");
$stmt->execute(['id' => $idUsuario]);
$reservaciones = $stmt->fetchAll();

require __DIR__ . '/../views/perfil.php';
exit;
