<?php
session_start();

/* ===============================
   VALIDAR SESIÓN
================================ */
if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

$idUsuario = $_SESSION['id_usuario'];

/* ===============================
   CONEXIÓN POSTGRES
================================ */
$host = $_ENV['DB_HOST'] ?? 'localhost';
$port = $_ENV['DB_PORT'] ?? '5432';
$dbname = $_ENV['DB_NAME'] ?? 'arca';
$user = $_ENV['DB_USER'] ?? 'postgres';
$password = $_ENV['DB_PASSWORD'] ?? '030899';

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

/* ===============================
   INSERTAR RESERVACIÓN
================================ */
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
