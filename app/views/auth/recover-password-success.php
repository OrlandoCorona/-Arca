<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Correo enviado — El Arca</title>
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
  fetchpriority="high"
  decoding="async"
>
      </div>

      <h2 class="auth-title">Correo enviado</h2>

      <p style="text-align:center;">
        Si el correo existe en nuestro sistema, recibirás instrucciones
        para restablecer tu contraseña.
      </p>

      <a href="/?view=login" class="btn btn-animated">
        <span class="text">Aceptar</span>
      </a>

    </div>

  </main>

  <footer class="site-footer auth-footer">
    <img src="/assets/images/logo-auth-footer.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
  </footer>

</body>
</html>
