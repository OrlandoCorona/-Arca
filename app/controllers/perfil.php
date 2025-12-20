<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$idUsuario = $_SESSION['id_usuario'];

$sqlUsuario = "
    SELECT nombre, correo
    FROM usuarios
    WHERE id = :id
";

$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute(['id' => $idUsuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    session_destroy();
    header('Location: /?view=login');
    exit;
}

$sqlReservas = "
    SELECT fecha, hora, zona
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC
";

$stmt = $pdo->prepare($sqlReservas);
$stmt->execute(['id' => $idUsuario]);
$reservaciones = $stmt->fetchAll();

require __DIR__ . '/../views/perfil.php';
exit;