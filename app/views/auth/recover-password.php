<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar contraseña — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body class="auth-page">

  <main class="auth-bg">

    <!-- IMAGEN DE FONDO (OBLIGATORIA PARA AUTH) -->
    <img
      src="/assets/images/login-bg.webp"
      class="auth-bg-img"
      alt=""
      loading="eager"
    >

    <div class="auth-glass">

      <div class="auth-logo-wrapper">
        <img
          src="/assets/images/logo-auth-top.webp"
          alt="El Arca"
          class="auth-logo"
          decoding="async"
        >

      </div>

      <h2 class="auth-title">Recuperar contraseña</h2>

      <form method="POST" action="/?action=recover-password" class="auth-form">

        <div class="form-group">
          <input
            type="email"
            id="correo"
            name="correo"
            required
            placeholder=" "
            autocomplete="email"
          >
          <label for="correo">Correo electrónico</label>
        </div>

        <button type="submit" class="btn btn-animated">
          <span class="text">Enviar instrucciones</span>
        </button>

      </form>

      <div class="auth-links">
        <a href="/?view=login">Volver a iniciar sesión</a>
      </div>

    </div>

  </main>

  <footer class="site-footer auth-footer">
    <div class="footer-inner">
      <img src="/assets/images/logo-auth-footer.jpg" alt="El Arca" class="footer-logo">
      <p>© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

</body>
</html>
