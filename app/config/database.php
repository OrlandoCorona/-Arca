<?php
declare(strict_types=1);

$databaseUrl = $_ENV['postgresql://arca_db_a9nb_user:StnvhufBfkRNP5koZBU4gX0u9ZLCKuG7@dpg-d52aa3vgi27c738jdv9g-a.oregon-postgres.render.com/arca_db_a9nb'] ?? null;

if (!$databaseUrl) {
    die('postgresql://arca_db_a9nb_user:StnvhufBfkRNP5koZBU4gX0u9ZLCKuG7@dpg-d52aa3vgi27c738jdv9g-a.oregon-postgres.render.com/arca_db_a9nb');
}

try {
    $pdo = new PDO($databaseUrl, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Error de conexión a la base de datos');
}
