<?php
declare(strict_types=1);

if (!isset($_SESSION['user_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$sql = "
    INSERT INTO reservaciones (
        user_id, nombre_cliente, telefono, correo, fecha, hora, zona
    ) VALUES (
        :user_id, :nombre, :telefono, :correo, :fecha, :hora, :zona";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'user_id' => $_SESSION['user_id'],
    'nombre'     => $_POST['nombre'],
    'telefono'   => $_POST['telefono'],
    'correo'     => $_POST['correo'],
    'fecha'      => $_POST['fecha'],
    'hora'       => $_POST['hora'],
    'zona'       => $_POST['zona'],
]);

header('Location: /?view=reservacion-exitosa');
exit;
