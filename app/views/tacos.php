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
  <title>Tacos — El Arca</title>
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
        <h1>Tacos</h1>
        <p>Los clásicos que nunca fallan, preparados al momento</p>
      </header>

      <div class="menu-grid">

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/taco1.jpg" alt="Taco al pastor">
          </div>
          <div class="menu-body">
            <h3>Taco al Pastor</h3>
            <p>Carne marinada, piña y salsa de la casa.</p>
            <span class="menu-price">$25</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/taco2.jpg" alt="Taco de bistec">
          </div>
          <div class="menu-body">
            <h3>Taco de Bistec</h3>
            <p>Jugoso bistec asado con guarniciones frescas.</p>
            <span class="menu-price">$30</span>
          </div>
        </article>

        <article class="menu-card">
          <div class="menu-media">
            <img src="/assets/images/taco3.jpg" alt="Taco de arrachera">
          </div>
          <div class="menu-body">
            <h3>Taco de Arrachera</h3>
            <p>Corte premium, sabor intenso y suave.</p>
            <span class="menu-price">$40</span>
          </div>
        </article>

      </div>
    </section>

  </main>
  <<footer class="site-footer">
    <p>
      © 2024 Restaurante-Bar El Arca<br>
      <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>

</body>
</html>
