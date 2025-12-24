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

  <!-- FONDO EXCLUSIVO AUTH -->
  <div class="auth-bg">

    <main class="form-container">

      <div class="auth-glass">

        <!-- LOGO -->
        <div class="auth-logo">
          <img src="/assets/images/inconoB.jpg" alt="El Arca">
        </div>

        <!-- TÍTULO -->
        <h1 class="auth-title">Iniciar sesión</h1>

        <!-- FORMULARIO -->
        <form method="POST"
              action="/?action=login"
              autocomplete="on"
              class="auth-form">

          <label for="correo">Correo electrónico</label>
          <input
            type="email"
            id="correo"
            name="correo"
            placeholder="correo@ejemplo.com"
            autocomplete="username"
            required
          >

          <label for="contrasena">Contraseña</label>
          <input
            type="password"
            id="contrasena"
            name="contrasena"
            placeholder="••••••••"
            autocomplete="current-password"
            required
          >

          <button type="submit" class="btn btn-animated">
            <span class="text">Iniciar sesión</span>
          </button>

        </form>

        <!-- LINKS -->
        <div class="auth-links">
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

    </main>

    <footer class="site-footer">
      <p>© 2024 Restaurante-Bar El Arca</p>
    </footer>

  </div>
</body>
</html>
