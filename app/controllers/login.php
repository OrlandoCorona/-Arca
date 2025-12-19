<?php

require __DIR__ . '/../config/database.php';

// Validar método
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

// Buscar usuario
$sql = "SELECT id, nombre, correo, password FROM usuarios WHERE correo = :correo";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);
$usuario = $stmt->fetch();

// Validar credenciales
if (!$usuario || !password_verify($contrasena, $usuario['password'])) {
    header('Location: /?view=incorrect-password');
    exit;
}

// 🔐 Seguridad: regenerar ID de sesión
session_regenerate_id(true);

// Crear sesión
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['nombre']     = $usuario['nombre'];
$_SESSION['correo']     = $usuario['correo'];

// Redirigir
header('Location: /?view=home');
exit;
