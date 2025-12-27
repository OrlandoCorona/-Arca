<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

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

$sql = "
    SELECT id_usuario, nombre, correo, contrasena_hash
    FROM usuarios
    WHERE correo = :correo
    LIMIT 1
";

$stmt = $pdo->prepare($sql);
$stmt->execute(['correo' => $correo]);
$usuario = $stmt->fetch();

if (!$usuario || !password_verify($contrasena, $usuario['contrasena_hash'])) {
    header('Location: /?view=incorrect-password');
    exit;
}

session_regenerate_id(true);

$_SESSION['id_usuario'] = $usuario['id_usuario'];
$_SESSION['nombre']     = $usuario['nombre'];
$_SESSION['correo']     = $usuario['correo'];

header('Location: /?view=home');
exit;
