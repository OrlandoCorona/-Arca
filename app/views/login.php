<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body class="auth-page">

  <div class="auth-bg">

    <main class="form-container">

      <div class="auth-glass">

        <!-- LOGO -->
        <div class="auth-logo">
          <img src="/assets/images/inconoB.jpg" alt="El Arca">
        </div>

        <h1 class="auth-title">Iniciar sesión</h1>

        <form method="POST" action="/?action=login" class="auth-form" autocomplete="on">

          <label for="correo">Correo electrónico</label>
          <input
            type="email"
            id="correo"
            name="correo"
            autocomplete="username"
            required
          >

          <label for="contrasena">Contraseña</label>
          <input
            type="password"
            id="contrasena"
            name="contrasena"
            autocomplete="current-password"
            required
          >

          <button type="submit" class="btn btn-animated">
            <span class="text">Iniciar sesión</span>
          </button>

        </form>

        <div class="auth-links">
          <p>
            ¿No tienes cuenta?
            <a href="/?view=register">Regístrate aquí</a>
          </p>
          <p>
            ¿Olvidaste tu contraseña?
            <a href="/?view=recover-password">Recupérala aquí</a>
          </p>
        </div>

      </div>
    </main>

    <footer class="site-footer">
      <img src="/assets/images/inconoB.jpg" alt="El Arca">
      <p>© 2024 Restaurante Bar El Arca</p>
    </footer>

  </div>
</body>
</html>
