<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=register');
    exit;
}

// Datos
$correo = strtolower(trim($_POST['correo'] ?? ''));
$nombre = trim($_POST['nombre'] ?? '');
$ap = trim($_POST['apellido_paterno'] ?? '');
$am = trim($_POST['apellido_materno'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$pass = $_POST['contrasena'] ?? '';
$repeat = $_POST['repetir_contrasena'] ?? '';

// Validaciones
if ($correo === '' || $nombre === '' || $ap === '' || $telefono === '' || $pass === '' || $repeat === '') {
    header('Location: /?view=register');
    exit;
}

// Helper valida email estricto
function is_valid_email_strict($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL))
        return false;

    // Chequeos adicionales
    if (strpos($str, ' ') !== false)
        return false;
    if (strpos($str, '..') !== false)
        return false;
    if (strpos($str, '@@') !== false)
        return false;

    // Desglosar
    $parts = explode('@', $str);
    if (count($parts) !== 2)
        return false;
    $user = $parts[0];
    $domain = $parts[1];

    // Dominios
    if (strpos($domain, '.') === false)
        return false;
    $dParts = explode('.', $domain);
    $tld = end($dParts);

    // TLD reglas
    if (strlen($tld) < 2)
        return false;
    if (preg_match('/\d/', $tld))
        return false; // sin numeros en TLD

    // Regla Gmail (Anti-Spam / User Preference)
    if (strtolower($domain) === 'gmail.com') {
        // Bloquear si empieza con 4+ numeros
        if (preg_match('/^\d{4,}/', $user)) {
            return false;
        }
    }

    return true;
}

if (!is_valid_email_strict($correo)) {
    // Podríamos pasar un error param, e.g. /?view=register&error=email
    header('Location: /?view=register');
    exit;
}

if ($pass !== $repeat) {
    header('Location: /?view=register');
    exit;
}

// Correo existente
$stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE correo = :correo LIMIT 1");
$stmt->execute(['correo' => $correo]);

if ($stmt->fetch()) {
    header('Location: /?view=email-already-registered');
    exit;
}

// Insertar usuario
$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = "
    INSERT INTO usuarios
    (correo, nombre, apellido_paterno, apellido_materno, telefono, password)
    VALUES
    (:correo, :nombre, :ap, :am, :telefono, :password)
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'correo' => $correo,
    'nombre' => $nombre,
    'ap' => $ap,
    'am' => $am,
    'telefono' => $telefono,
    'password' => $hash
]);

header('Location: /?view=successful_registration');
exit;
