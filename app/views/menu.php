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
  <title>Menú — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container">


  <section class="menu-section">
    <button class="btn-back" onclick="history.back()">
  ← Volver
</button>
    <header class="menu-header">
      <h1>Menú</h1>
      <p>Selecciona una categoría para explorar nuestros productos</p>
    </header>

    <div class="menu-grid">

      <!-- CATEGORÍA -->
      <a href="/?view=food" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio1.jpg" alt="Comida">
        </div>
        <div class="menu-body">
          <h3>Comida</h3>
          <p>Platillos preparados al momento</p>
        </div>
      </a>

      <a href="/?view=beers" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio5.jpg" alt="Cervezas">
        </div>
        <div class="menu-body">
          <h3>Cervezas</h3>
          <p>Selección de cervezas bien frías</p>
        </div>
      </a>

      <a href="/?view=micheladas" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio6.jpg" alt="Micheladas">
        </div>
        <div class="menu-body">
          <h3>Micheladas</h3>
          <p>Clásicas y especiales</p>
        </div>
      </a>

      <a href="/?view=tacos" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio3.jpg" alt="Tacos">
        </div>
        <div class="menu-body">
          <h3>Tacos</h3>
          <p>Sabores tradicionales</p>
        </div>
      </a>

      <a href="/?view=bottles" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio7.jpg" alt="Botellas">
        </div>
        <div class="menu-body">
          <h3>Botellas</h3>
          <p>Para compartir</p>
        </div>
      </a>

      <a href="/?view=extras" class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio2.jpg" alt="Extras">
        </div>
        <div class="menu-body">
          <h3>Extras</h3>
          <p>Complementos y adicionales</p>
        </div>
      </a>

    </div>
  </section>

</main>
 <footer class="site-footer">
  <img src="/assets/images/inconoB.jpg" alt="El Arca">
  <p>© 2024 Restaurante Bar El Arca</p>
</footer>

</body>
</html>
