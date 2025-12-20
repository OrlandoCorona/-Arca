<?php
declare(strict_types=1);

if (!isset($_SESSION['Usuario_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$Usuarioid = $_SESSION['Usuario_id'];

$sqlUsuario = "
    SELECT nombre, correo
    FROM usuarios
    WHERE id = :id
";

$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute(['id' => $Usuarioid]);
$usuario = $stmt->fetch();

if (!$usuario) {
    session_destroy();
    header('Location: /?view=login');
    exit;
}

$sqlReservas = "
    SELECT fecha, hora, zona
    FROM reservaciones
    WHERE usuario_id = :id
    ORDER BY fecha DESC
";

$stmt = $pdo->prepare($sqlReservas);
$stmt->execute(['id' => $Usuarioid]);
$reservaciones = $stmt->fetchAll();

require __DIR__ . '/../views/perfil.php';
exit;