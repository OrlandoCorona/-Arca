<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

// Solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=recover-password');
    exit;
}

$correo = trim($_POST['correo'] ?? '');

// Validación básica
if ($correo === '') {
    header('Location: /?view=recover-password');
    exit;
}

// Validar formato de correo
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?view=recover-password');
    exit;
}

try {
    /**
     * IMPORTANTE:
     * - No revelamos si el correo existe o no
     * - La consulta solo valida existencia
     */
    $sql = "
        SELECT id_usuario
        FROM usuarios
        WHERE correo = :correo
        LIMIT 1
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['correo' => $correo]);
    $stmt->fetch();

    // Siempre redirigimos al mismo resultado
    header('Location: /?view=recover-password-success');
    exit;

} catch (PDOException $e) {
    // No exponer errores internos
    header('Location: /?view=recover-password-success');
    exit;
}
