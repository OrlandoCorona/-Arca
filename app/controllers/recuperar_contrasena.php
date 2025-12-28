<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=recover-password');
    exit;
}

$correo = trim($_POST['correo'] ?? '');

if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=recover-password');
    exit;
}

/*
  Importante:
  - NO revelamos si el correo existe
  - NO tocamos password aún
*/

$stmt = $pdo->prepare(
    "SELECT id_usuario FROM usuarios WHERE correo = :correo LIMIT 1"
);
$stmt->execute(['correo' => $correo]);

// Siempre respondemos igual
header('Location: /?view=recover-password-success');
exit;
