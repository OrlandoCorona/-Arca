<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=login');
    exit;
}

$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if (!$token || !$password || $password !== $confirm) {
    // Invalid input
    header('Location: /?view=login'); // Or back to reset page with error
    exit;
}

// 1. Validate Token
$decoded = base64_decode($token);
$parts = explode('|', $decoded);

if (count($parts) !== 3) {
    die("Token inválido.");
}

[$userId, $expiry, $signature] = $parts;

// Check expiry
if (time() > (int) $expiry) {
    die("El enlace ha expirado.");
}

// Verify signature
$secretKey = 'EL_ARCA_SECRET_KEY_CHANGE_ME_IN_PROD';
$payload = "$userId|$expiry";
$calculatedSignature = hash_hmac('sha256', $payload, $secretKey);

if (!hash_equals($signature, $calculatedSignature)) {
    die("Token inválido.");
}

// 2. Update Password
$hash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $pdo->prepare("UPDATE usuarios SET password = :password WHERE id_usuario = :id");
$stmt->execute([
    'password' => $hash,
    'id' => $userId
]);

// 3. Redirect
header('Location: /?view=login&message=password_updated');
exit;
