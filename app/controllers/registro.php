<?php

require __DIR__ . '/../config/database.php';

// Solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=register');
    exit;
}

// Obtener datos
$nombre            = trim($_POST['nombre'] ?? '');
$correo            = trim($_POST['correo'] ?? '');
$password          = $_POST['password'] ?? '';
$passwordConfirm   = $_POST['password_confirm'] ?? '';

// Validar campos obligatorios
if (
    $nombre === '' ||
    $correo === '' ||
    $password === '' ||
    $passwordConfirm === ''
) {
    header('Location: /?view=register');
    exit;
}

// Validar coincidencia de contraseñas
if ($password !== $passwordConfirm) {
    header('Location: /?view=register');
    exit;
}

// Validar formato de correo
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=register');
    exit;
}

try {
    // Verificar si el correo ya existe
    $sql = "SELECT id FROM usuarios WHERE correo = :correo LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':correo' => $correo]);

    if ($stmt->fetch()) {
        header('Location: /?view=email-already-registered');
        exit;
    }

    // Hashear contraseña
    $hash = password_hash($password, PASSWORD_BCRYPT);

    // Insertar usuario
    $sql = "
        INSERT INTO usuarios (nombre, correo, password)
        VALUES (:nombre, :correo, :password)
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre'   => $nombre,
        ':correo'   => $correo,
        ':password' => $hash
    ]);

    header('Location: /?view=successful_registration');
    exit;

} catch (PDOException $e) {
    // Error interno, no exponer
    header('Location: /?view=register');
    exit;
}
