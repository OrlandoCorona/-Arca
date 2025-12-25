<?php
declare(strict_types=1);

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

session_unset();
session_destroy();

header('Location: /?view=login');
exit;
