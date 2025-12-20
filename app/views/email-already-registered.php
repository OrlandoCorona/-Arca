<!DOCTYPE html><?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Correo ya registrado</title>

  <link rel="stylesheet" href="/assets/css/styles.css">
  <style>
    body{
      font-family: Arial, sans-serif;
      margin:0;
      padding:0;
      background: url('/assets/images/fondoBorroso.jpg') center/cover no-repeat;
      color:#f2efef;
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .mensaje-flotante{
      width:320px;
      background:#fff;
      border-radius:12px;
      padding:22px;
      text-align:center;
      color:#000;
    }
    .boton-aceptar{
      display:inline-block;
      padding:10px 22px;
      background:#007bff;
      color:#fff;
      text-decoration:none;
      border-radius:8px;
      margin-top:12px;
    }
  </style>
</head>
<body>

<div class="mensaje-flotante">
  <p>
    Este correo ya se encuentra registrado.<br>
    Por favor inicia sesión o utiliza otro correo.
  </p>
  <a href="/?view=register" class="boton-aceptar">Aceptar</a>
</div>

</body>
</html>
  <footer>
    © 2024 Todos los derechos reservados. Restaurante-Bar El Arca<br>
    <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="Copyright">
  </footer>
</body>
</html>
