<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear cuenta — El Arca</title>

  <!-- CSS GLOBAL -->
  <link rel="stylesheet" href="/assets/css/styles.css">

  <!-- PRELOAD LCP -->
  <link
    rel="preload"
    as="image"
    href="/assets/images/login-bg.webp"
    fetchpriority="high"
  >
</head>

<body class="auth-page">

  <main class="auth-bg">

    <!-- IMAGEN DE FONDO (LCP CONTROLADO) -->
    <img
      src="/assets/images/login-bg.webp"
      alt=""
      class="auth-bg-img"
      loading="eager"
      fetchpriority="high"
      decoding="async"
    >

    <div class="auth-glass">

      <!-- LOGO -->
      <div class="auth-logo-wrapper">
        <img
          src="/assets/images/logo-auth-top.webp"
          alt="El Arca"
          class="auth-logo"
          decoding="async"
        >
      </div>

      <h2 class="auth-title">Crear cuenta</h2>

      <form
        method="POST"
        action="/?action=register"
        class="auth-form"
        autocomplete="on"
      >

        <div class="form-group">
          <input type="text" id="nombre" name="nombre" required placeholder=" " autocomplete="given-name">
          <label for="nombre">Nombre</label>
        </div>

        <div class="form-group">
          <input type="text" id="apellido_paterno" name="apellido_paterno" required placeholder=" " autocomplete="family-name">
          <label for="apellido_paterno">Apellido paterno</label>
        </div>

        <div class="form-group">
          <input type="text" id="apellido_materno" name="apellido_materno" placeholder=" ">
          <label for="apellido_materno">Apellido materno</label>
        </div>

        <div class="form-group">
          <input type="email" id="correo" name="correo" required placeholder=" " autocomplete="email">
          <label for="correo">Correo electrónico</label>
        </div>

        <div class="form-group">
          <input type="tel" id="telefono" name="telefono" required placeholder=" " autocomplete="tel">
          <label for="telefono">Teléfono</label>
        </div>

        <div class="form-group">
          <input type="password" id="contrasena" name="contrasena" required placeholder=" " autocomplete="new-password">
          <label for="contrasena">Contraseña</label>
        </div>

        <div class="form-group">
          <input type="password" id="repetir_contrasena" name="repetir_contrasena" required placeholder=" " autocomplete="new-password">
          <label for="repetir_contrasena">Repetir contraseña</label>
        </div>

        <button type="submit" class="btn btn-animated">
          <span class="text">Crear cuenta</span>
        </button>

      </form>

      <div class="auth-links">
        <p>
          ¿Ya tienes cuenta?
          <a href="/?view=login">Inicia sesión</a>
        </p>
      </div>

    </div>
  </main>

  <footer class="site-footer auth-footer">
    <img src="/assets/images/logo-auth-footer.jpg" alt="El Arca">
    <p>© 2024 Restaurante Bar El Arca</p>
  </footer>

</body>
</html>
