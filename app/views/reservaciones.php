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

    <!-- Top actions -->
    <div class="section-top">
      <button class="btn-back" onclick="history.back()">← Volver</button>
    </div>

    <!-- Formulario de reservación -->
    <section class="section reservation-section">
      <header class="section-header">
        <h2>Realizar reservación</h2>
        <p>Selecciona la fecha para tu visita</p>
      </header>

      <form method="POST" action="/?action=realizar_reserva" class="reservation-form">
        <label for="fecha">Fecha de la reserva</label>
        <input
          type="date"
          id="fecha"
          name="fecha"
          required
          min="<?= date('Y-m-d') ?>"
        >

        <button type="submit" class="btn btn-primary">
          Confirmar reserva
        </button>
      </form>
    </section>

    <!-- Listado de reservaciones -->
    <section class="section reservations-list">
      <header class="section-header">
        <h2>Mis reservaciones</h2>
      </header>

      <?php if (empty($reservaciones)): ?>
        <p class="empty-state">
          No tienes reservaciones registradas.
        </p>
      <?php else: ?>
        <?php foreach ($reservaciones as $r): ?>
          <article class="reserva-card">
            <p><strong>Nombre:</strong> <?= htmlspecialchars($r['nombre_cliente']) ?></p>
            <p><strong>Teléfono:</strong> <?= htmlspecialchars($r['telefono']) ?></p>
            <p><strong>Correo:</strong> <?= htmlspecialchars($r['correo']) ?></p>
            <p><strong>Fecha:</strong> <?= htmlspecialchars($r['fecha']) ?></p>
            <p><strong>Hora:</strong> <?= htmlspecialchars($r['hora']) ?></p>
            <p><strong>Zona:</strong> <?= htmlspecialchars($r['zona']) ?></p>
          </article>
        <?php endforeach; ?>
      <?php endif; ?>
    </section>

  </main>

  <footer class="site-footer">
    <p>
      © 2024 Restaurante-Bar El Arca<br>
      <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
  </footer>

</body>
</html>
