<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: /?view=login');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=reservaciones');
    exit;
}

$idUsuario = $_SESSION['id_usuario'];
$fecha = trim($_POST['fecha'] ?? '');
$hora  = trim($_POST['hora'] ?? '');
$zona  = trim($_POST['zona'] ?? '');

if ($fecha === '' || $hora === '' || $zona === '') {
    header('Location: /?view=reservaciones');
    exit;
}

// 1. Validate Date (Not past)
$selectedDate = new DateTime($fecha);
$today = new DateTime('today');

if ($selectedDate < $today) {
    // Error: Past date
    header('Location: /?view=reservaciones&error=invalid_date');
    exit;
}

// 2. Validate Operating Hours
$dayOfWeek = (int)$selectedDate->format('w'); // 0 (Sun) to 6 (Sat)
$timeParts = explode(':', $hora);
$minutes = ((int)$timeParts[0] * 60) + (int)$timeParts[1];

// Schedule config
$schedule = [
    0 => ['open' => 12 * 60, 'close' => 18 * 60], // Sun: 12-18
    1 => null,                                     // Mon: Closed
    2 => ['open' => 12 * 60, 'close' => 19 * 60], // Tue: 12-19
    3 => ['open' => 12 * 60, 'close' => 19 * 60], // Wed: 12-19
    4 => ['open' => 12 * 60, 'close' => 19 * 60], // Thu: 12-19
    5 => ['open' => 12 * 60, 'close' => 19 * 60], // Fri: 12-19
    6 => ['open' => 12 * 60, 'close' => 19 * 60], // Sat: 12-19
];

$dayConfig = $schedule[$dayOfWeek] ?? null;

if (!$dayConfig) {
    // Error: Closed on this day (Monday)
    header('Location: /?view=reservaciones&error=closed');
    exit;
}

if ($minutes < $dayConfig['open'] || $minutes > $dayConfig['close']) {
    // Error: Out of hours
    header('Location: /?view=reservaciones&error=hours');
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO reservaciones (id_usuario, fecha, hora, zona)
    VALUES (:id, :fecha, :hora, :zona)
");

$stmt->execute([
    'id'    => $idUsuario,
    'fecha' => $fecha,
    'hora'  => $hora,
    'zona'  => $zona
]);

header('Location: /?view=reservation-success');
exit;
