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
    <a href="/?action=logout">Salir</a>
</div>

<div class="container">
    <h2>Mi Perfil</h2>

    <div class="perfil-datos">
        <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
        <p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo']) ?></p>
    </div>

    <hr>

    <h2>Mis Reservaciones</h2>

    <?php if (empty($reservaciones)): ?>
        <p style="text-align:center;">
            No tienes reservaciones registradas.
        </p>
    <?php else: ?>
        <?php foreach ($reservaciones as $reserva): ?>
            <div class="reserva">
                <p><strong>Fecha:</strong> <?= htmlspecialchars($reserva['fecha']) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($reserva['hora']) ?></p>
                <p><strong>Zona:</strong> <?= htmlspecialchars($reserva['zona']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<footer>
    <p>
        © 2024 Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

</body>
</html>
