<?php
require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

$correo = trim($_POST['correo'] ?? '');

if ($correo === '') {
    header('Location: /?view=recover');
    exit;
}

$sql = "SELECT id FROM usuarios WHERE correo = :correo";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

$usuario = $stmt->fetch();

if (!$usuario) {
    // Correo no registrado
    header('Location: /?view=login');
    exit;
}

// En esta práctica NO se cambia contraseña
// Solo confirmamos que el correo existe

header('Location: /?view=recover-password-success');
exit;
