<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

/**
 * Solo POST
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

$correo     = trim($_POST['correo'] ?? '');
$contrasena = $_POST['contrasena'] ?? '';

if ($correo === '' || $contrasena === '') {
    header('Location: /?view=login');
    exit;
}

/**
 * Buscar usuario
 */
$sql = "
    SELECT id, nombre, correo, password
    FROM usuarios
    WHERE correo = :correo
    LIMIT 1
";

$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);

$usuario = $stmt->fetch();

/**
 * Validar contraseña
 */
if (!$usuario || !password_verify($contrasena, $usuario['password'])) {
    header('Location: /?view=incorrect-password');
    exit;
}

/**
 * Seguridad de sesión
 */
session_regenerate_id(true);

/**
 * Guardar sesión
 */
$_SESSION['Usuario_id'] = $usuario['id'];
$_SESSION['nombre']     = $usuario['nombre'];
$_SESSION['correo']     = $usuario['correo'];

/**
 * Login exitoso
 */
header('Location: /?view=home');
exit;
