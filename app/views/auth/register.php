<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear cuenta — El Arca</title>
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

        <form method="POST" action="/?action=register" class="auth-form" autocomplete="on">

          <label for="correo">Correo electrónico</label>
          <input type="email" id="correo" name="correo" autocomplete="email" required>

          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" autocomplete="given-name" required>

          <label for="apellido_paterno">Apellido paterno</label>
          <input type="text" id="apellido_paterno" name="apellido_paterno" autocomplete="family-name" required>

          <label for="apellido_materno">Apellido materno</label>
          <input type="text" id="apellido_materno" name="apellido_materno">

          <label for="telefono">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" autocomplete="tel" required>

          <label for="contrasena">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" autocomplete="new-password" required>

          <label for="repetir_contrasena">Repetir contraseña</label>
          <input type="password" id="repetir_contrasena" name="repetir_contrasena" autocomplete="new-password" required>

       <button type="submit" class="btn btn-animated">
  <span class="text">Registrarme</span>
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

    <<footer class="site-footer">
    <p>
      © 2024 Restaurante-Bar El Arca<br>
      <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
  </footer>>
    


  </div>

</body>
</html>
