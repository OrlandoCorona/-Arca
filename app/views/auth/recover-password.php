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

        <p class="auth-description">
          Ingresa tu correo electrónico y te enviaremos instrucciones
          para restablecer tu contraseña.
        </p>

        <form method="POST" action="/?action=recover" class="auth-form" autocomplete="on">

          <label for="correo">Correo electrónico</label>
          <input type="email" id="correo" name="correo" autocomplete="email" required>

         <button type="submit" class="btn btn-animated">
  <span class="text">Registrarme</span>
</button>


        </form>

        <div class="auth-links">
          <p>
            <a href="/?view=login">Volver a iniciar sesión</a>
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
