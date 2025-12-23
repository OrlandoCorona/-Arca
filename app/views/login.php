<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body class="auth-page">

  <main class="auth-container">
<div class="page">
    <div class="card">
        <h2>Iniciar Sesión</h2>

        <form method="post" action="/?action=login" autocomplete="on">
            <input
                type="email"
                name="correo"
                placeholder="Correo electrónico"
                autocomplete="username"
                required
            >
            <input
                type="password"
                name="contrasena"
                placeholder="Contraseña"
                autocomplete="current-password"
                required
            >
            <button type="submit" class="login-btn">Iniciar sesión</button>
        </form>

        <div class="links">
            <p>
                ¿No tienes cuenta?
                <a href="/?view=register">Regístrate aquí</a>
            </p>
            <p>
                ¿Olvidaste tu contraseña?
                <a href="/?view=recover">Recupérala aquí</a>
            </p>
        </div>
    </div>
</div>

<footer>
    <p>
        © 2024 Todos los derechos reservados. Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

</body>
</html>
