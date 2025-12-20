<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| REALIZAR RESERVA
|--------------------------------------------------------------------------
| session_start() YA se ejecuta en public/index.php
*/

if (!isset($_SESSION['user_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=reservaciones');
    exit;
}

$idUsuario = $_SESSION['user_id'];

/*
|--------------------------------------------------------------------------
| Sanitizar datos
|--------------------------------------------------------------------------
*/

$nombre   = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$correo   = trim($_POST['correo'] ?? '');
$fecha    = trim($_POST['fecha'] ?? '');
$hora     = trim($_POST['hora'] ?? '');
$zona     = trim($_POST['zona'] ?? '');

/*
|--------------------------------------------------------------------------
| Validaciones básicas
|--------------------------------------------------------------------------
*/
if (
    $nombre === '' ||
    $correo === '' ||
    $fecha === '' ||
    $hora === '' ||
    $zona === ''
) {
    header('Location: /?view=reservaciones');
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=reservaciones');
    exit;
}

$fechaObj = DateTime::createFromFormat('Y-m-d', $fecha);
if (!$fechaObj || $fechaObj->format('Y-m-d') !== $fecha) {
    header('Location: /?view=reservaciones');
    exit;
}

$horaObj = DateTime::createFromFormat('H:i', $hora);
if (!$horaObj || $horaObj->format('H:i') !== $hora) {
    header('Location: /?view=reservaciones');
    exit;
}

try {

    /*
    |--------------------------------------------------------------------------
    | Control de duplicados (misma fecha / hora / zona)
    |--------------------------------------------------------------------------
    */
    $sqlDuplicado = "
        SELECT 1
        FROM reservaciones
        WHERE fecha = :fecha
          AND hora  = :hora
          AND zona  = :zona
        LIMIT 1
    ";

    $stmt = $pdo->prepare($sqlDuplicado);
    $stmt->execute([
        ':fecha' => $fecha,
        ':hora'  => $hora,
        ':zona'  => $zona
    ]);

    if ($stmt->fetch()) {
        header('Location: /?view=reservaciones');
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Insertar reservación
    |--------------------------------------------------------------------------
    */
    $sqlInsert = "
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

    $stmt = $pdo->prepare($sqlInsert);
    $stmt->execute([
        ':id_usuario' => $idUsuario,
        ':nombre'     => $nombre,
        ':telefono'   => $telefono,
        ':correo'     => $correo,
        ':fecha'      => $fecha,
        ':hora'       => $hora,
        ':zona'       => $zona
    ]);

    header('Location: /?view=reservation-success');
    exit;

} catch (PDOException $e) {
    // error_log($e->getMessage());
    header('Location: /?view=reservaciones');
    exit;
}
