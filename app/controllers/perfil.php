<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| PERFIL DE USUARIO
|--------------------------------------------------------------------------
| - session_start() YA se ejecuta en public/index.php
| - Este controller SOLO maneja lógica
*/

if (!isset($_SESSION['user_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$idUsuario = $_SESSION['user_id'];

/*
|--------------------------------------------------------------------------
| Datos del usuario
|--------------------------------------------------------------------------
*/
$sqlUsuario = "
    SELECT
        id,
        nombre,
        correo,
        creado_en
    FROM usuarios
    WHERE id = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute([':id' => $idUsuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    session_destroy();
    header('Location: /?view=login');
    exit;
}

/*
|--------------------------------------------------------------------------
| Reservaciones del usuario
|--------------------------------------------------------------------------
*/
$sqlReservas = "
    SELECT
        nombre_cliente,
        telefono,
        correo,
        fecha,
        hora,
        zona,
        creado_en
    FROM reservaciones
    WHERE id_usuario = :id
    ORDER BY fecha DESC, hora DESC
";

$stmt = $pdo->prepare($sqlReservas);
$stmt->execute([':id' => $idUsuario]);
$reservaciones = $stmt->fetchAll();

/*
|--------------------------------------------------------------------------
| Cargar vista
|--------------------------------------------------------------------------
| Variables disponibles en la vista:
| - $usuario
| - $reservaciones
*/
require __DIR__ . '/../views/perfil.php';
