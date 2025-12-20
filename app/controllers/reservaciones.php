<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$idUsuario = $_SESSION['id_usuario'];

// Obtener reservaciones del usuario
$sql = "
    SELECT nombre_cliente, telefono, correo, fecha, hora, zona
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC, hora DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $idUsuario]);
$reservaciones = $stmt->fetchAll();

require __DIR__ . '/../views/reservaciones.php';
exit;
