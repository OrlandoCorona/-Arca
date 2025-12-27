<?php
declare(strict_types=1);

$url = $_ENV['DATABASE_URL'] ?? '';

if ($url === '') {
    die('DATABASE_URL no definida');
}

$db = parse_url($url);

$host     = $db['host'];
$port     = $db['port'] ?? 5432;
$dbname   = ltrim($db['path'], '/');
$user     = $db['user'];
$password = $db['pass'];

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('Error de conexión a la base de datos');
}
