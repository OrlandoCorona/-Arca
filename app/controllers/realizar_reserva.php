<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=home');
    exit;
}

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$id_usuario = (int) $_SESSION['id_usuario'];

$nombre   = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$correo   = trim($_POST['correo'] ?? '');
$fecha    = trim($_POST['fecha'] ?? '');
$hora     = trim($_POST['hora'] ?? '');
$zona     = trim($_POST['zona'] ?? '');

if ($nombre === '' || $correo === '' || $fecha === '' || $hora === '' || $zona === '') {
    header('Location: /?view=reservaciones');
    exit;
}

$sql = "
    INSERT INTO reservaciones (
        id_usuario, nombre_cliente, telefono, correo, fecha, hora, zona
    ) VALUES (
        :id_usuario, :nombre, :telefono, :correo, :fecha, :hora, :zona
    )
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id_usuario' => $id_usuario,
    'nombre'     => $nombre,
    'telefono'   => $telefono,
    'correo'     => $correo,
    'fecha'      => $fecha,
    'hora'       => $hora,
    'zona'       => $zona,
]);

header('Location: /?view=reservation-success');
exit;
