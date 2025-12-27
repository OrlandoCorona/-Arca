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

   <div class="auth-logo-wrapper">
  <img src="/assets/images/inconoB.jpg" alt="El Arca" class="auth-logo">
</div>


      <h2 class="auth-title">Iniciar sesión</h2>

      <form method="POST" action="/?action=login" class="auth-form" autocomplete="on">

        <div class="form-group">
          <input
            type="email"
            id="correo"
            name="correo"
            required
            placeholder=" "
            autocomplete="username"
          >
          <label for="correo">Correo electrónico</label>
        </div>

        <div class="form-group">
          <input
            type="password"
            id="contrasena"
            name="contrasena"
            required
            placeholder=" "
            autocomplete="current-password"
          >
          <label for="contrasena">Contraseña</label>
        </div>

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

  <!-- FOOTER ORIGINAL, SIN FONDO -->
<footer class="site-footer auth-footer">
    <img src="/assets/images/inconoB.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
  </footer>

</body>
</html>
