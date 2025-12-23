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
  <title>Micheladas — El Arca</title>
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
      <h1>Micheladas</h1>
      <p>Refrescantes, clásicas y especiales</p>
    </header>

    <div class="menu-grid">

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio5.jpg" alt="Michelada clásica">
        </div>
        <div class="menu-body">
          <h3>Michelada Clásica</h3>
          <p>Limón, sal y salsas tradicionales.</p>
          <span class="menu-price">$70</span>
        </div>
      </article>

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio6.jpg" alt="Michelada especial">
        </div>
        <div class="menu-body">
          <h3>Michelada Especial</h3>
          <p>Mezcla premium con ingredientes únicos.</p>
          <span class="menu-price">$90</span>
        </div>
      </article>

      <article class="menu-card">
        <div class="menu-media">
          <img src="/assets/images/inicio7.jpg" alt="Michelada preparada">
        </div>
        <div class="menu-body">
          <h3>Michelada Preparada</h3>
          <p>Ideal para los que buscan algo diferente.</p>
          <span class="menu-price">$100</span>
        </div>
      </article>

    </div>
  </section>

</main>

</body>
</html>
