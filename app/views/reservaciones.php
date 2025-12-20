<?php
declare(strict_types=1);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Reservaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/styles.css">

    <style>
        body{
            margin:0;
            min-height:100vh;
            background:url("/assets/images/fondoBorroso.jpg") center/cover no-repeat;
            font-family:Arial, sans-serif;
        }

        .menu{
            position:fixed;
            top:0;
            width:100%;
            background:#071428;
            padding:12px 0;
            text-align:center;
            z-index:100;
        }

        .menu a{
            color:white;
            margin:0 15px;
            text-decoration:none;
            font-weight:500;
        }

        .container{
            max-width:1100px;
            margin:100px auto 40px;
            background:rgba(255,255,255,0.95);
            border-radius:12px;
            padding:30px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }

        h2{
            color:#007bff;
            text-align:center;
            margin-bottom:20px;
        }

        .reserva{
            border-bottom:1px solid #ddd;
            padding:15px 0;
        }

        .reserva:last-child{
            border-bottom:none;
        }

        footer{
            background:black;
            color:white;
            text-align:center;
            padding:12px 0;
        }
    </style>
</head>

<body>

<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?view=perfil">Perfil</a>
    <a href="/?action=logout">Salir</a>
</div>

<div class="container">
    <h2>Mis Reservaciones</h2>

    <?php if (empty($reservaciones)): ?>
        <p style="text-align:center;">No tienes reservaciones registradas.</p>
    <?php else: ?>
        <?php foreach ($reservaciones as $r): ?>
            <div class="reserva">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($r['nombre_cliente']) ?></p>
                <p><strong>Teléfono:</strong> <?= htmlspecialchars($r['telefono']) ?></p>
                <p><strong>Correo:</strong> <?= htmlspecialchars($r['correo']) ?></p>
                <p><strong>Fecha:</strong> <?= htmlspecialchars($r['fecha']) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($r['hora']) ?></p>
                <p><strong>Zona:</strong> <?= htmlspecialchars($r['zona']) ?></p>
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
