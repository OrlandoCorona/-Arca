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

  <div class="auth-bg">

    <main class="form-container">
      <div class="auth-glass">

        <div class="auth-logo">
          <img src="/assets/images/inconoB.jpg" alt="El Arca">
        </div>

        <h1 class="auth-title">Recuperar contraseña</h1>

        <form method="POST" action="/?action=recover" class="auth-form">
          <label for="correo">Correo electrónico</label>
          <input
            type="email"
            id="correo"
            name="correo"
            required
            placeholder="correo@ejemplo.com"
          >

          <button type="submit" class="btn btn-animated">
            <span class="text">Enviar instrucciones</span>
          </button>
        </form>

        <div class="auth-links">
          <a href="/?view=login">Volver a iniciar sesión</a>
        </div>

      </div>
    </main>

    <footer class="site-footer">
  <div class="footer-inner">
    <img src="/assets/images/iconoB.jpg" alt="El Arca" class="footer-logo">
    <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
  </div>
</footer>


  </div>
</body>
</html>
