<?php
declare(strict_types=1);
require __DIR__ . '/../config/database.php';

// Solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=recover');
    exit;
}

$correo = trim($_POST['correo'] ?? '');

// Validación básica
if ($correo === '') {
    header('Location: /?view=recover');
    exit;
}

// Validar formato de correo
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=recover');
    exit;
}

try {
    $sql = "SELECT id FROM usuarios WHERE correo = :correo LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':correo' => $correo]);
    $usuario = $stmt->fetch();

    if (!$usuario) {
    header('Location: /?view=recover-password-success');
    exit;

    }

    /*
      En esta etapa del proyecto:
      - NO se cambia contraseña
      - NO se envía correo real
      - Solo se confirma que el correo existe
    */

    header('Location: /?view=recover-password-success');
    exit;

} catch (PDOException $e) {
    // Error interno, no exponer
 header('Location: /?view=recover-password-success');
exit;
}