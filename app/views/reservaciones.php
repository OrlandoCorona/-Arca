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
  <title>Reservaciones — El Arca</title>
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<main class="app-container">

  <button class="btn-back" onclick="history.back()">← Volver</button>

  <section class="reservation-section">
    <h1>Reservar mesa</h1>

    <form method="POST" action="/?action=realizar_reserva" class="reservation-form">
      <label for="fecha">Fecha</label>
      <input type="date" name="fecha" id="fecha" required min="<?= date('Y-m-d') ?>">

      <button type="submit" class="btn btn-animated">
        <span class="text">Confirmar reserva</span>
      </button>
    </form>

  </section>

</main>

<footer class="site-footer">
  <img src="/assets/images/inconoB.jpg" alt="El Arca">
  <p>© 2024 Restaurante Bar El Arca</p>
</footer>

<script src="/assets/js/script.js"></script>
</body>
</html>
