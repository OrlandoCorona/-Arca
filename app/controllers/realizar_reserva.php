<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

$idUsuario = $_SESSION['id_usuario'];

$host = 'localhost';
$db   = 'arca';
$user = 'postgres';
$pass = 'TU_PASSWORD_DE_POSTGRES';
$port = '5432';

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$db",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "
        INSERT INTO reservaciones (
            id_usuario,
            nombre_cliente,
            telefono,
            correo,
            fecha,
            hora,
            zona
        ) VALUES (
            :id_usuario,
            :nombre,
            :telefono,
            :correo,
            :fecha,
            :hora,
            :zona
        )
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id_usuario' => $idUsuario,
        ':nombre'     => $_POST['nombre'],
        ':telefono'   => $_POST['telefono'],
        ':correo'     => $_POST['correo'],
        ':fecha'      => $_POST['fecha'],
        ':hora'       => $_POST['hora'],
        ':zona'       => $_POST['zona'],
    ]);

    header('Location: /?view=reservation-success');
    exit;
}
