<?php
session_start();
require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

$correo = trim($_POST['correo'] ?? '');
$password = $_POST['password'] ?? '';

if ($correo === '' || $password === '') {
    header('Location: /?view=login');
    exit;
}

$sql = "SELECT id, nombre, password FROM usuarios WHERE correo = :correo LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

$usuario = $stmt->fetch();

if (!$usuario || !password_verify($password, $usuario['password'])) {
    header('Location: /?view=incorrect-password');
    exit;
}

$_SESSION['id_usuario'] = $usuario['id'];
$_SESSION['nombre'] = $usuario['nombre'];

header('Location: /?view=home');
exit;
