<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=home');
    exit;
}

$id_usuario = (int) $_SESSION['id_usuario'];

$fecha = $_POST['fecha'] ?? '';
$hora  = $_POST['hora'] ?? '';
$zona  = $_POST['zona'] ?? '';

if ($fecha === '' || $hora === '' || $zona === '') {
    header('Location: /?view=reservaciones');
    exit;
}

$sql = "
    INSERT INTO reservaciones (id_usuario, fecha, hora, zona)
    VALUES (:id_usuario, :fecha, :hora, :zona)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id_usuario' => $id_usuario,
    'fecha'      => $fecha,
    'hora'       => $hora,
    'zona'       => $zona
]);

header('Location: /?view=reservation-success');
exit;
