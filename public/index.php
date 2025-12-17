<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Iniciar Sesión</title>
  <link href="styleL.css" rel="stylesheet" type="text/css" />
  <style>
        /* Estilos para el footer */
        footer {
          background-color: black;
          color: white;
          text-align: center;
          padding: 10px 0;
          position: fixed;
          bottom: 0;
          width: 100%;
        }
  </style>
</head>
<body>
  <div class="mobile-screen">
    <div class="header">
      <h1>Iniciar Sesión</h1>
    </div>

    <div class="logo">
      <img src="user_avatar.png" alt="Avatar de Usuario" class="avatar">
    </div>

    <form id="login-form" method="post" action="inicio_sesion.php">
      <input type="email" name="correo" placeholder="Correo" class="login-input" required>
      <input type="password" name="contrasena" placeholder="Contraseña" class="login-input" required>      
      <button type="submit" class="login-btn">Iniciar Sesión</button>
    </form>

    <div class="other-options">
      <div class="option" id="newUser"><a href="registro.html" class="option-text">Registrar</a></div>
      <div class="option" id="fPass"><a href="recuperar_contrasena.html" class="option-text">Olvidé mi contraseña</a></div>
    </div>
  </div>
</body>
<footer>
  <p style="background-color: black; color:white; text-align: center;">© 2024 Todos los derechos reservados. Restaurante-Bar El Arca  <br>  <img src="inconoB.jpg" width="30px" height="30px" alt="Copyright"></p>
</footer>
</html>
