<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=register');
    exit;
}

// Datos
$correo   = strtolower(trim($_POST['correo'] ?? ''));
$nombre   = trim($_POST['nombre'] ?? '');
$ap       = trim($_POST['apellido_paterno'] ?? '');
$am       = trim($_POST['apellido_materno'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$pass     = $_POST['contrasena'] ?? '';
$repeat   = $_POST['repetir_contrasena'] ?? '';

// Validaciones
if ($correo === '' || $nombre === '' || $ap === '' || $telefono === '' || $pass === '' || $repeat === '') {
    header('Location: /?view=register');
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=register');
    exit;
}

if ($pass !== $repeat) {
    header('Location: /?view=register');
    exit;
}

// Correo existente
$stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE correo = :correo LIMIT 1");
$stmt->execute(['correo' => $correo]);

if ($stmt->fetch()) {
    header('Location: /?view=email-already-registered');
    exit;
}

// Insertar usuario
$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = "
    INSERT INTO usuarios
    (correo, nombre, apellido_paterno, apellido_materno, telefono, password)
    VALUES
    (:correo, :nombre, :ap, :am, :telefono, :password)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'correo'   => $correo,
    'nombre'   => $nombre,
    'ap'       => $ap,
    'am'       => $am,
    'telefono' => $telefono,
    'password' => $hash
]);

header('Location: /?view=successful_registration');
exit;
