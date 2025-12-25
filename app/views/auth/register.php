<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body class="auth-page">

  <div class="auth-bg">

    <main class="form-container">
      <div class="auth-glass">

        <div class="auth-logo">
          <img src="/assets/images/inconoB.jpg" alt="El Arca">
        </div>

        <h1 class="auth-title">Crear cuenta</h1>

        <form method="POST" action="/?action=register" class="auth-form">

          <label>Correo electrónico</label>
          <input type="email" name="correo" required>

          <label>Nombre</label>
          <input type="text" name="nombre" required>

          <label>Apellido paterno</label>
          <input type="text" name="apellido_paterno" required>

          <label>Apellido materno</label>
          <input type="text" name="apellido_materno">

          <label>Teléfono</label>
          <input type="tel" name="telefono" required>

          <label>Contraseña</label>
          <input type="password" name="contrasena" required>

          <label>Repetir contraseña</label>
          <input type="password" name="repetir_contrasena" required>

          <button type="submit" class="btn btn-animated">
            <span class="text">Registrarme</span>
          </button>
        </form>

        <div class="auth-links">
          <a href="/?view=login">¿Ya tienes cuenta? Inicia sesión</a>
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
