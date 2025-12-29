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
  <title>El Arca — Restaurante Bar</title>
<link rel="stylesheet" href="/assets/css/styles.css?v=2025-01">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container home">

    <section class="hero">
      <img src="/assets/images/logo-home.png" alt="El Arca" class="hero-logo">
      <h1 class="hero-title">
        Restaurante Bar <span>El Arca</span>
      </h1>
      <p class="hero-subtitle">
        Naturaleza · Gastronomía · Experiencia Premium
      </p>
    </section>

    <section class="section section-intro">
      <header class="section-header">
        <h2>Una experiencia diferente</h2>
        <p>
          En El Arca combinamos gastronomía, naturaleza y momentos memorables.
        </p>
      </header>

      <div class="intro-grid">
        <article class="intro-card">
          <h3>Ambiente natural</h3>
          <p>Espacios abiertos y zonas familiares para disfrutar sin prisas.</p>
        </article>

        <article class="intro-card">
          <h3>Cocina de calidad</h3>
          <p>Ingredientes frescos y recetas cuidadosamente preparadas.</p>
        </article>

        <article class="intro-card">
          <h3>Momentos especiales</h3>
          <p>Eventos, reuniones y celebraciones en un entorno único.</p>
        </article>
      </div>
    </section>

    <section class="section section-featured">
      <header class="section-header">
        <h2>Lo más destacado</h2>
      </header>

      <div class="carousel">
        <div class="carousel-track">

          <article class="carousel-item">
            <img src="/assets/images/arcairis.jpg" alt="Coctelería">
            <div class="carousel-caption">
              <h3>Coctelería</h3>
              <p>Sabores únicos y combinaciones especiales.</p>
            </div>
          </article>

          <article class="carousel-item">
            <img src="/assets/images/tacos-asada-inicio.png" alt="Tacos de asada">
            <div class="carousel-caption">
              <h3>Tacos</h3>
              <p>Tradición y sabor en cada platillo.</p>
            </div>
          </article>

          <article class="carousel-item">
            <img src="/assets/images/micheladas-inicio.png" alt="Micheladas">
            <div class="carousel-caption">
              <h3>Micheladas</h3>
              <p>Refrescantes y preparadas al momento.</p>
            </div>
          </article>

        </div>
      </div>
    </section>

    <section class="section section-cta">
      <div class="cta-box">
        <h2>¿Listo para visitarnos?</h2>
        <p>Reserva tu mesa y vive la experiencia El Arca.</p>

        <a href="/?view=reservaciones" class="btn btn-animated">
          <span class="text">Reservar ahora</span>
        </a>
      </div>
    </section>

  </main>

  <footer class="site-footer">
    <div class="footer-inner">
      <img src="/assets/images/logo-footer.jpg" alt="El Arca" class="footer-logo">
      <p class="footer-text">© 2024 Restaurante Bar El Arca</p>
    </div>
  </footer>

</body>
</html>
