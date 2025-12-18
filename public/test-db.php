<?php
require __DIR__ . '/../app/config/database.php';

$stmt = $pdo->query('SELECT NOW()');
echo 'Conectado correctamente: ';
print_r($stmt->fetch());