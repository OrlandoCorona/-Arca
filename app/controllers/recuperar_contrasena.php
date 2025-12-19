<?php

require __DIR__ . '/../config/database.php';

// Solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

$correo = trim($_POST['correo'] ?? '');

// Validar vacío
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
        // Correo no registrado
        header('Location: /?view=login');
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
    header('Location: /?view=login');
    exit;
}
