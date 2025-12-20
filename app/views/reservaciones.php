<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="/ElArcaWeb/public/assets/css/styles.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: url("/assets/images/fondoBorroso.jpg") center/cover no-repeat;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 80px auto;
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

        .reserva {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .reserva:last-child {
            border-bottom: none;
        }

        .reserva p {
            margin: 6px 0;
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

<!-- MENÚ -->
<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?action=reservaciones">Reservaciones</a>
    <a href="/?action=perfil">Perfil</a>
    <a href="/?action=logout">Salir</a>
</div>

<div class="container">
    <h2>Mis Reservaciones</h2>

    <?php if (empty($reservaciones)): ?>
        <p style="text-align:center;">
            No tienes reservaciones registradas.
        </p>
    <?php else: ?>
        <?php foreach ($reservaciones as $reserva): ?>
            <div class="reserva">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($reserva['nombre_cliente']) ?></p>
                <p><strong>Teléfono:</strong> <?= htmlspecialchars($reserva['telefono']) ?></p>
                <p><strong>Correo:</strong> <?= htmlspecialchars($reserva['correo']) ?></p>
                <p><strong>Fecha:</strong> <?= htmlspecialchars($reserva['fecha']) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($reserva['hora']) ?></p>
                <p><strong>Zona:</strong> <?= htmlspecialchars($reserva['zona']) ?></p>
                <p><strong>Creada:</strong> <?= htmlspecialchars($reserva['creado_en']) ?></p>
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
