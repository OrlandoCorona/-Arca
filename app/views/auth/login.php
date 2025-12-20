<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="/ElArcaWeb/public/assets/css/styles.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: url("/assets/images/fondoBorroso.jpg") center/cover no-repeat;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }

        .page {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: #fff;
            width: 100%;
            max-width: 380px;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            text-align: center;
        }

        .card h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .card input {
            width: 100%;
            padding: 12px;
            margin-bottom: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
        }

        .login-btn:hover {
            background: #0056b3;
        }

        .links {
            margin-top: 16px;
            font-size: 0.95rem;
        }

        .links a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .links a:hover {
            text-decoration: underline;
        }

        footer {
            background: black;
            color: white;
            text-align: center;
            padding: 12px 0;
        }
    </style>
</head>

<body>

<div class="page">
    <div class="card">
        <h2>Iniciar Sesión</h2>

        <!-- FORMULARIO CORRECTO -->
        <form method="post" action="/?action=login" autocomplete="on">

    <input
        type="email"
        name="correo"
        placeholder="Correo electrónico"
        autocomplete="username"
        required
    >

    <input
        type="password"
        name="contrasena"
        placeholder="Contraseña"
        autocomplete="current-password"
        required
    >

    <button type="submit" class="login-btn">
        Iniciar sesión
    </button>
</form>

        <div class="links">
            <p>
                ¿No tienes cuenta?
                <a href="/?view=register">Regístrate aquí</a>
            </p>
            <p>
                ¿Olvidaste tu contraseña?
                <a href="/?view=recover">Recupérala aquí</a>
            </p>
        </div>
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
