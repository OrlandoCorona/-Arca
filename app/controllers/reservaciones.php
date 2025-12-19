<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| RESERVACIONES - CONTROLLER
|--------------------------------------------------------------------------
| session_start() YA fue ejecutado en public/index.php
*/

if (!isset($_SESSION['user_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

$idUsuario = $_SESSION['user_id'];

/*
|--------------------------------------------------------------------------
| Obtener datos del usuario
|--------------------------------------------------------------------------
*/
$sqlUsuario = "
    SELECT nombre, correo
    FROM usuarios
    WHERE id = :id
    LIMIT 1
";

$stmt = $pdo->prepare($sqlUsuario);
$stmt->execute([':id' => $idUsuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    $_SESSION = [];
    session_destroy();
    header('Location: /?view=login');
    exit;
}

/*
|--------------------------------------------------------------------------
| Exponer datos a la vista
|--------------------------------------------------------------------------
*/
$_SESSION['reservaciones_usuario'] = $usuario;

/*
|--------------------------------------------------------------------------
| Cargar vista
|--------------------------------------------------------------------------
*/
require __DIR__ . '/../views/reservaciones.php';
