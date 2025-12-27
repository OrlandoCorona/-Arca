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

  <main class="auth-bg">
    <div class="auth-glass">

      <!-- LOGO SUPERIOR -->
      <img src="/assets/images/inconoB.jpg" alt="El Arca" class="auth-logo">

      <h2 class="auth-title">Iniciar sesión</h2>

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

      <!-- LOGO INFERIOR -->
      <img src="/assets/images/inconoB.jpg" alt="El Arca Restaurante Bar" class="auth-footer-logo">

      <p class="auth-footer-text">
        El Arca · Restaurante Bar<br>
        Desde 2007
      </p>

    </div>
  </main>

</body>
</html>
