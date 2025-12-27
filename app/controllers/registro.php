<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=register');
    exit;
}

$correo           = trim($_POST['correo'] ?? '');
$nombre           = trim($_POST['nombre'] ?? '');
$apellido_paterno = trim($_POST['apellido_paterno'] ?? '');
$apellido_materno = trim($_POST['apellido_materno'] ?? '');
$telefono         = trim($_POST['telefono'] ?? '');
$contrasena       = $_POST['contrasena'] ?? '';
$repetir          = $_POST['repetir_contrasena'] ?? '';

if (
    $correo === '' || $nombre === '' || $apellido_paterno === '' ||
    $telefono === '' || $contrasena === '' || $repetir === ''
) {
    header('Location: /?view=register');
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=register');
    exit;
}

if ($contrasena !== $repetir) {
    header('Location: /?view=register');
    exit;
}

$sql = "SELECT id_usuario FROM usuarios WHERE correo = :correo LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

if ($stmt->fetch()) {
    header('Location: /?view=email-already-registered');
    exit;
}

$hash = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "
    INSERT INTO usuarios
        (correo, nombre, apellido_paterno, apellido_materno, telefono, contrasena_hash)
    VALUES
        (:correo, :nombre, :ap, :am, :telefono, :hash)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'correo'   => $correo,
    'nombre'   => $nombre,
    'ap'       => $apellido_paterno,
    'am'       => $apellido_materno,
    'telefono' => $telefono,
    'hash'     => $hash
]);

header('Location: /?view=successful_registration');
exit;
