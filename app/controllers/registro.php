<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

// Solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=register');
    exit;
}

$nombre   = trim($_POST['nombre'] ?? '');
$correo   = trim($_POST['correo'] ?? '');
$password = $_POST['password'] ?? '';
$repass   = $_POST['repass'] ?? '';

// Validación básica
if ($nombre === '' || $correo === '' || $password === '' || $repass === '') {
    header('Location: /?view=register');
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=register');
    exit;
}

if ($password !== $repass) {
    header('Location: /?view=register');
    exit;
}

// Verificar correo duplicado
$stmt = $pdo->prepare('SELECT id FROM usuarios WHERE correo = :correo');
$stmt->execute(['correo' => $correo]);

if ($stmt->fetch()) {
    header('Location: /?view=email-already-registered');
    exit;
}

// Hash seguro
$hash = password_hash($password, PASSWORD_BCRYPT);

// Insertar usuario
$sql = "
    INSERT INTO usuarios (nombre, correo, password)
    VALUES (:nombre, :correo, :password)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nombre'   => $nombre,
    'correo'   => $correo,
    'password' => $hash
]);

// Registro exitoso
header('Location: /?view=successful_registration');
exit;
