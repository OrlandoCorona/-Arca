<?php

require __DIR__ . '/../config/database.php';

// Validar método
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=home');
    exit;
}

// Validar sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: /?view=login');
    exit;
}

// Obtener datos
$user_id = $_SESSION['user_id'];

$nombre   = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$correo   = trim($_POST['correo'] ?? '');
$fecha    = trim($_POST['fecha'] ?? '');
$hora     = trim($_POST['hora'] ?? '');
$zona     = trim($_POST['zona'] ?? '');

// Validación mínima
if (
    $nombre === '' ||
    $correo === '' ||
    $fecha === '' ||
    $hora === '' ||
    $zona === ''
) {
    header('Location: /?view=reservaciones');
    exit;
}

// Insertar reservación
$sql = "
    INSERT INTO reservaciones
        (user_id, nombre_cliente, telefono, correo, fecha, hora, zona)
    VALUES
        (:user_id, :nombre, :telefono, :correo, :fecha, :hora, :zona)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':user_id' => $user_id,
    ':nombre'     => $nombre,
    ':telefono'   => $telefono,
    ':correo'     => $correo,
    ':fecha'      => $fecha,
    ':hora'       => $hora,
    ':zona'       => $zona
]);

// Redirigir a éxito
header('Location: /?view=reservation-success');
exit;
