<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Inicio de Sesión</title>

    <link rel="stylesheet" href="/assets/css/styles.css">

    <style>
        :root{
            --primary:#007bff;
            --primary-dark:#0056b3;
            --bg-soft: rgba(255,255,255,0.92);
            --text-dark:#0b1a2b;
        }

        body{
            font-family: Arial, sans-serif;
            margin:0;
            padding:0;
            background: url('/assets/images/fondoBorroso.jpg') center/cover no-repeat;
            min-height:100vh;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }

        .mensaje-flotante{
            width:320px;
            background: linear-gradient(135deg,var(--bg-soft), rgba(240,246,255,0.86));
            backdrop-filter: blur(8px);
            border-radius:12px;
            padding:22px;
            text-align:center;
            box-shadow:0 10px 30px rgba(5,20,60,0.12);
            color:var(--text-dark);
        }

        .mensaje-flotante p{
            margin-bottom:16px;
            font-size:1rem;
        }

        .boton-aceptar{
            display:inline-block;
            padding:10px 22px;
            background: linear-gradient(180deg,var(--primary),var(--primary-dark));
            color:#fff;
            text-decoration:none;
            border-radius:8px;
            box-shadow:0 6px 18px rgba(0,123,255,0.22);
            transition:transform .12s ease, box-shadow .12s ease;
        }

        .boton-aceptar:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 24px rgba(0,123,255,0.28);
        }

        footer{
            margin-top:20px;
            width:100%;
            background:black;
            color:white;
            text-align:center;
            padding:10px 0;
        }
    </style>
</head>

<body>

<div class="mensaje-flotante">
    <p>Correo o contraseña incorrectos.</p>
    <a href="/?view=login" class="boton-aceptar">Aceptar</a>
</div>

<footer>
    <p>
        © 2024 Todos los derechos reservados. Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

</body>
</html>
