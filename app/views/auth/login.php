<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restaurante Bar El Arca</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <div class="login-container" role="main" aria-labelledby="login-title">
        <h2 id="login-title">Iniciar Sesión</h2>
        <form action="/?view=login_submit" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required autocomplete="username" aria-required="true">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required autocomplete="current-password" aria-required="true">
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes cuenta? <a class="option-text" href="/?view=register">Regístrate aquí</a></p>
        <p>¿Olvidaste tu contraseña? <a class="option-text" href="/?view=recover">Recupérala aquí</a></p>
    </div>
</body>
</html>
