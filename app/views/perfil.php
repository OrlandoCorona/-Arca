<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/styles.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: url("/assets/images/fondoBorroso.jpg") center/cover no-repeat;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .menu {
            position: fixed;
            top: 0;
            width: 100%;
            background: #007bff;
            padding: 12px 0;
            text-align: center;
            z-index: 100;
        }

        .menu a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1100px;
            margin: 100px auto 40px;
            background: rgba(255,255,255,0.95);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        .perfil-datos p {
            margin: 8px 0;
        }

        .reserva {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .reserva:last-child {
            border-bottom: none;
        }

        footer {
            background: black;
            color: white;
            text-align: center;
            padding: 12px 0;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?action=logout">Salir</a>
</div>

<div class="container">
    <h2>Mi Perfil</h2>

    <div class="perfil-datos">
        <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
        <p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo']) ?></p>
    </div>

    <hr>

    <h2>Mis Reservaciones</h2>

    <?php if (empty($reservaciones)): ?>
        <p style="text-align:center;">
            No tienes reservaciones registradas.
        </p>
    <?php else: ?>
        <?php foreach ($reservaciones as $reserva): ?>
            <div class="reserva">
                <p><strong>Fecha:</strong> <?= htmlspecialchars($reserva['fecha']) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($reserva['hora']) ?></p>
                <p><strong>Zona:</strong> <?= htmlspecialchars($reserva['zona']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<footer>
    <p>
        © 2024 Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

</body>
</html>
