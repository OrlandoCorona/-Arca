<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=reservaciones');
    exit;
}

$idUsuario = $_SESSION['id_usuario'];
$fecha = trim($_POST['fecha'] ?? '');
$hora  = trim($_POST['hora'] ?? '');
$zona  = trim($_POST['zona'] ?? '');

if ($fecha === '' || $hora === '' || $zona === '') {
    header('Location: /?view=reservaciones');
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO reservaciones (id_usuario, fecha, hora, zona)
    VALUES (:id, :fecha, :hora, :zona)
");

$stmt->execute([
    'id'    => $idUsuario,
    'fecha' => $fecha,
    'hora'  => $hora,
    'zona'  => $zona
]);

header('Location: /?view=reservation-success');
exit;
