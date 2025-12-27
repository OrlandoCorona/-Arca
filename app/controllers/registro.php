<?php
declare(strict_types=1);

/**
 * ============================
 * REGISTRO DE USUARIO
 * ============================
 * - Solo POST
 * - NO inicia sesión
 * - Redirige a successful_registration
 */

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=register');
    exit;
}

// ----------------------------
// Obtener datos
// ----------------------------
$correo           = trim($_POST['correo'] ?? '');
$nombre           = trim($_POST['nombre'] ?? '');
$apellido_paterno = trim($_POST['apellido_paterno'] ?? '');
$apellido_materno = trim($_POST['apellido_materno'] ?? '');
$telefono         = trim($_POST['telefono'] ?? '');
$contrasena       = $_POST['contrasena'] ?? '';
$repetir          = $_POST['repetir_contrasena'] ?? '';

// ----------------------------
// Validaciones
// ----------------------------
if (
    $correo === '' ||
    $nombre === '' ||
    $apellido_paterno === '' ||
    $telefono === '' ||
    $contrasena === '' ||
    $repetir === ''
) {
    header('Location: /?view=register');
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=register');
    exit;
}

if ($contrasena !== $repetir) {
    header('Location: /?view=register');
    exit;
}

// ----------------------------
// Verificar correo existente
// ----------------------------
$sql = "SELECT id_usuario FROM usuarios WHERE correo = :correo LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

if ($stmt->fetch()) {
    header('Location: /?view=email-already-registered');
    exit;
}

// ----------------------------
// Insertar usuario (CLAVE)
// ----------------------------
$hash = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "
    INSERT INTO usuarios
        (correo, nombre, apellido_paterno, apellido_materno, telefono, password)
    VALUES
        (:correo, :nombre, :ap, :am, :telefono, :password)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'correo'   => $correo,
    'nombre'   => $nombre,
    'ap'       => $apellido_paterno,
    'am'       => $apellido_materno,
    'telefono' => $telefono,
    'password' => $hash
]);

// ----------------------------
// REGISTRO OK
// ----------------------------
header('Location: /?view=successful_registration');
exit;
