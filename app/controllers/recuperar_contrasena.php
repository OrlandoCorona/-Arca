<?php
declare(strict_types=1);

require __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?view=recover-password');
    exit;
}

$correo = trim($_POST['correo'] ?? '');

if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    // Should ideally show error, but for enumeration protection we redirect
    header('Location: /?view=recover-password');
    exit;
}

// 1. Check if user exists
$stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE correo = :correo LIMIT 1");
$stmt->execute(['correo' => $correo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // 2. Generate Token
    // Format: base64(userId|expiry|signature)
    $userId = $user['id_usuario'];
    $expiry = time() + (30 * 60); // 30 minutes

    // Secret key - in production moves to ENV
    $secretKey = 'EL_ARCA_SECRET_KEY_CHANGE_ME_IN_PROD';

    $payload = "$userId|$expiry";
    $signature = hash_hmac('sha256', $payload, $secretKey);
    $token = base64_encode("$payload|$signature");

    // 3. Send Email
    $resetLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/?view=reset-password&token=" . urlencode($token);

    $subject = 'Recuperar contraseña - El Arca';
    $message = "
    <html>
    <head>
      <title>Recuperación de contraseña</title>
    </head>
    <body style='font-family: sans-serif; color: #333;'>
        <h2>Recuperación de contraseña</h2>
        <p>Has solicitado restablecer tu contraseña en El Arca.</p>
        <p>Haz clic en el siguiente enlace para continuar:</p>
        <p><a href='$resetLink' style='background: #000; color: #fff; padding: 10px 20px; text-decoration: none;'>Restablecer contraseña</a></p>
        <p>Este enlace expira en 30 minutos.</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: El Arca <noreply@elarca.com>" . "\r\n";

    // Logging for Developer Convenience:
    file_put_contents(__DIR__ . '/../../last_recovery_link.txt', $resetLink);

    // Attempt to send
    @mail($correo, $subject, $message, $headers);
}

// 4. Redirect to success
header('Location: /?view=recover-password-success');
exit;
