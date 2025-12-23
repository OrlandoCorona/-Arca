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

  <!-- Header + Back -->
  <div class="section-top">
    <a href="/?view=menu" class="btn-back">← Volver al menú</a>
  </div>

  <section class="menu-section">
    <header class="menu-header">
      <h1>Tacos</h1>
      <p>Sabores tradicionales preparados al momento</p>
    </header>

    <div class="menu-grid">

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio1.jpg" alt="Tacos al pastor">
        </div>
        <div class="menu-body">
          <h3>Tacos al Pastor</h3>
          <p>Carne marinada, piña y cebolla.</p>
          <span class="menu-price">$25 c/u</span>
        </div>
      </article>

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio2.jpg" alt="Tacos de arrachera">
        </div>
        <div class="menu-body">
          <h3>Tacos de Arrachera</h3>
          <p>Corte premium asado al carbón.</p>
          <span class="menu-price">$35 c/u</span>
        </div>
      </article>

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio3.jpg" alt="Tacos especiales">
        </div>
        <div class="menu-body">
          <h3>Tacos Especiales</h3>
          <p>Receta exclusiva de la casa.</p>
          <span class="menu-price">$40 c/u</span>
        </div>
      </article>

    </div>
  </section>

</main>

</body>
</html>
