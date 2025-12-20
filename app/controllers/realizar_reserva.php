<?php
declare(strict_types=1);

if (!isset($_SESSION['Usuario_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$sql = "
    INSERT INTO reservaciones (
        usuario_id, nombre_cliente, telefono, correo, fecha, hora, zona
    ) VALUES (
        :usuario_id, :nombre, :telefono, :correo, :fecha, :hora, :zona";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'usuario_id' => $_SESSION['usuario_id'],
    'nombre'     => $_POST['nombre'],
    'telefono'   => $_POST['telefono'],
    'correo'     => $_POST['correo'],
    'fecha'      => $_POST['fecha'],
    'hora'       => $_POST['hora'],
    'zona'       => $_POST['zona'],
]);

header('Location: /?view=reservacion-exitosa');
exit;
