<?php
// app/views/auth/reset-password.php
$token = $_GET['token'] ?? '';
if (!$token) {
    header('Location: /?view=login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña — El Arca</title>
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body class="auth-page">

    <main class="auth-bg">
        <div class="auth-glass border-beam-container">
            <div class="border-beam"></div>

            <div style="position: relative; z-index: 2; width: 100%;">
                <h2 class="auth-title">Nueva Contraseña</h2>

                <form action="/?action=reset_password" method="POST" class="auth-form">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                    <div class="form-group">
                        <input type="password" name="password" id="pass" required placeholder=" " minlength="8">
                        <label for="pass">Nueva contraseña</label>
                    </div>

                    <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm" required placeholder=" "
                            minlength="8">
                        <label for="confirm">Confirmar contraseña</label>
                    </div>

                    <button type="submit" class="btn btn-premium" style="width: 100%; margin-top: 1rem;">
                        Guardar y Entrar
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>