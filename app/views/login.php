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

  <div class="form-group">
  <input type="email" name="email" required placeholder=" ">
  <label>Correo electrónico</label>
</div>

<div class="form-group">
  <input type="password" name="password" required placeholder=" ">
  <label>Contraseña</label>
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

      <!-- LOGO INFERIOR -->
   
    </div>
  </main>
<footer class="site-footer">
  <div class="footer-inner">
    <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
    <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
  </div>
</footer>


</body>
</html>
