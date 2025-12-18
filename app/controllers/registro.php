<?php
require __DIR__ . '/../config/database.php';

if ($_POST['password'] !== $_POST['password_confirm']) {
    header('Location: /?view=register');
    exit;
}


$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$password = $_POST['password'] ?? '';

if ($nombre === '' || $correo === '' || $password === '') {
    header('Location: /?view=register');
    exit;
}

$sql = "SELECT id FROM usuarios WHERE correo = :correo";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

if ($stmt->fetch()) {
    header('Location: /?view=email-already-registered');
    exit;
}

$hash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nombre, correo, password)
        VALUES (:nombre, :correo, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nombre' => $nombre,
    'correo' => $correo,
    'password' => $hash
]);

header('Location: /?view=successful_registration');
exit;
