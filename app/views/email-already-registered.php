<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Correo ya registrado — El Arca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body class="auth-page">

    <main class="auth-bg">

        <div class="auth-glass">

            <div class="auth-logo-wrapper">
                <img src="/assets/images/logo-auth-top.jpg" alt="El Arca" class="auth-logo">
            </div>

            <h2 class="auth-title">Este correo ya está asociado a una cuenta.
                Puedes iniciar sesión o recuperar tu contraseña.</p>
                <a href="/?view=recover-password">¿Olvidaste tu contraseña?</a>

                <a href="/?view=login" class="btn btn-animated">
                    <span class="text">Volver</span>
                </a>

        </div>

    </main>

    <footer class="site-footer auth-footer">
        <img src="/assets/images/logo-auth-footer.jpg" alt="El Arca">
        <p>© 2024 Restaurante Bar El Arca</p>
    </footer>

</body>

</html>