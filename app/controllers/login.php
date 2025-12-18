<?php
session_start();

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

$correo = trim($_POST['correo'] ?? '');
$contrasena = $_POST['contrasena'] ?? '';

if ($correo === '' || $contrasena === '') {
    header('Location: /?view=login');
    exit;
}

$sql = "SELECT id, nombre, correo, password FROM usuarios WHERE correo = :correo";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

$usuario = $stmt->fetch();

if (!$usuario) {
    header('Location: /?view=incorrect-password');
    exit;
}

if (!password_verify($contrasena, $usuario['password'])) {
    header('Location: /?view=incorrect-password');
    exit;
}

// ✅ Login correcto
$_SESSION['id_usuario'] = $usuario['id'];
$_SESSION['nombre'] = $usuario['nombre'];

header('Location: /?view=home');
exit;
