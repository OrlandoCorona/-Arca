<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<div class="form-container">
    <h2>Recuperar contraseña</h2>

    <p class="form-description">
        Ingresa tu correo electrónico y te enviaremos instrucciones para restablecer tu contraseña.
    </p>

    <form method="post" action="/?action=recover" autocomplete="on">

        <input
            type="email"
            name="correo"
            placeholder="Correo electrónico"
            autocomplete="email"
            required
        >

        <button type="submit" class="btn">
            Restablecer contraseña
        </button>
    </form>

    <div class="links">
        <p>
            <a href="/?view=login">Volver a iniciar sesión</a>
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
