<?php
declare(strict_types=1);

if (!isset($_SESSION['id_usuario'])) {
  header('Location: /?view=login');
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>
<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?view=perfil"><img src="/assets/images/user.png" width="30"></a>
    <a href="/?action=logout"><img src="/assets/images/logout.png" width="30"></a>
</div>

<div class="menu-grid">
    <div class="menu-item">
        <img src="/assets/images/cerveza.jpg">
        <button onclick="location.href='/?view=beers'">CERVEZAS</button>
    </div>

    <div class="menu-item">
        <img src="/assets/images/comida.jpg">
        <button onclick="location.href='/?view=food'">COMIDA</button>
    </div>

    <div class="menu-item">
        <img src="/assets/images/tacos.jpg">
        <button onclick="location.href='/?view=tacos'">TACOS</button>
    </div>

    <div class="menu-item">
        <img src="/assets/images/micheladas.jpg">
        <button onclick="location.href='/?view=micheladas'">MICHELADAS</button>
    </div>

    <div class="menu-item">
        <img src="/assets/images/botellas.jpg">
        <button onclick="location.href='/?view=bottles'">BOTELLAS</button>
    </div>

    <div class="menu-item">
        <img src="/assets/images/extras.jpg">
        <button onclick="location.href='/?view=extras'">EXTRAS</button>
    </div>
</div>

    <footer>
        <p>Restaurante-Bar El Arca &copy; 2024</p>
    </footer>
</body>
</html>
