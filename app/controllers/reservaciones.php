<?php
declare(strict_types=1);

if (!isset($_SESSION['User_id'])) {
    header('Location: /?view=login');
    exit;
}

require __DIR__ . '/../views/reservaciones.php';
exit;