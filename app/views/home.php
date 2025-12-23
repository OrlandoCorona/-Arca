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
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

  <?php require __DIR__ . '/partials/navbar.php'; ?>

  <main class="app-container home">

    <!-- HERO -->
    <section class="hero">
      <div class="hero-content">
        <h1 class="hero-title"> <span> Restaurante Bar </span> "<span>El Arca</span>"
        </h1>

        <p class="hero-subtitle">
          Restaurante · Bar · Naturaleza · Experiencia Premium
        </p>

        <div class="hero-actions">
          <a href="/?view=menu" class="btn btn-primary">Ver menú</a>
          <a href="/?view=reservaciones" class="btn btn-secondary">Reservar ahora</a>
        </div>
      </div>
    </section>

    <!-- INTRO / EXPERIENCIA -->
    <section class="section section-intro">
      <header class="section-header">
        <h2>Una experiencia diferente</h2>
        <p>
          En El Arca combinamos gastronomía, naturaleza y momentos memorables
          en un entorno pensado para disfrutar sin prisas.
        </p>
      </header>

      <div class="intro-grid">
        <article class="intro-card">
          <h3>Ambiente natural</h3>
          <p>
            Espacios abiertos, jardines y zonas familiares diseñadas para
            relajarte y convivir.
          </p>
        </article>

        <article class="intro-card">
          <h3>Cocina de calidad</h3>
          <p>
            Ingredientes frescos, recetas cuidadas y sabores que se recuerdan.
          </p>
        </article>

        <article class="intro-card">
          <h3>Momentos especiales</h3>
          <p>
            Celebraciones, reuniones y eventos en un entorno único.
          </p>
        </article>
      </div>
    </section>

    <!-- DESTACADOS / PROMOCIONES -->
    <section class="section section-featured">
      <header class="section-header">
        <h2>Lo más destacado</h2>
        <p>
          Descubre algunas de las razones por las que nuestros clientes
          regresan.
        </p>
      </header>

      <div class="featured-grid">
        <article class="featured-card">
          <div class="featured-media">
            <img src="/assets/images/inicio10.png" alt="Ambiente del restaurante">
          </div>
          <div class="featured-body">
            <h3>El ambiente</h3>
            <p>
              Un espacio pensado para disfrutar de día o de noche.
            </p>
          </div>
        </article>

        <article class="featured-card">
          <div class="featured-media">
            <img src="/assets/images/of1.jpg" alt="Promociones">
          </div>
          <div class="featured-body">
            <h3>Promociones</h3>
            <p>
              Ofertas especiales y eventos durante todo el año.
            </p>
          </div>
        </article>

        <article class="featured-card">
          <div class="featured-media">
            <img src="/assets/images/inicio3.jpg" alt="Eventos">
          </div>
          <div class="featured-body">
            <h3>Eventos</h3>
            <p>
              Celebraciones familiares y reuniones en un entorno ideal.
            </p>
          </div>
        </article>
      </div>
    </section>

    <!-- LLAMADO FINAL -->
    <section class="section section-cta">
      <div class="cta-box">
        <h2>¿Listo para visitarnos?</h2>
        <p>
          Reserva tu mesa y vive la experiencia El Arca.
        </p>
        <a href="/?view=reservaciones" class="btn btn-primary btn-large">
          Reservar ahora
        </a>
      </div>
    </section>

  </main>

  <script src="/assets/js/script.js"></script>
</body>
</html>
