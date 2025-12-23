<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body class="auth-page">

  <main class="auth-container">
<div class="form-container">
    <h2>Crear cuenta</h2>

    <form method="post" action="/?action=register" autocomplete="on">

        <input
            type="email"
            name="correo"
            placeholder="Correo electrónico"
            autocomplete="email"
            required
        >

        <input
            type="text"
            name="nombre"
            placeholder="Nombre"
            autocomplete="given-name"
            required
        >

        <input
            type="text"
            name="apellido_paterno"
            placeholder="Apellido paterno"
            autocomplete="family-name"
            required
        >

        <input
            type="text"
            name="apellido_materno"
            placeholder="Apellido materno"
            autocomplete="additional-name"
        >

        <input
            type="tel"
            name="telefono"
            placeholder="Teléfono"
            autocomplete="tel"
            required
        >

        <input
            type="password"
            name="contrasena"
            placeholder="Contraseña"
            autocomplete="new-password"
            required
        >

        <input
            type="password"
            name="repetir_contrasena"
            placeholder="Repetir contraseña"
            autocomplete="new-password"
            required
        >

        <button type="submit" class="btn">
            Registrarme
        </button>
    </form>

    <div class="links">
        <p>
            ¿Ya tienes cuenta?
            <a href="/?view=login">Inicia sesión</a>
        </p>
    </div>
</div>

<footer>
    <p>
        © 2024 Todos los derechos reservados. Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

</body>
</html>
