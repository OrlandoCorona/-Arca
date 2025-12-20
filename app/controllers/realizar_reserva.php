<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$sql = "
    INSERT INTO reservaciones (
        id_usuario, nombre_cliente, telefono, correo, fecha, hora, zona
    ) VALUES (
        :id_usuario, :nombre, :telefono, :correo, :fecha, :hora, :zona";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id_usuario' => $_SESSION['id_usuario'],
    'nombre'     => $_POST['nombre'],
    'telefono'   => $_POST['telefono'],
    'correo'     => $_POST['correo'],
    'fecha'      => $_POST['fecha'],
    'hora'       => $_POST['hora'],
    'zona'       => $_POST['zona'],
]);

header('Location: /?view=reservacion-exitosa');
exit;
