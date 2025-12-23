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
    <a href="/?view=perfil">Perfil</a>
    <a href="/?action=logout">Salir</a>
</div>

<div class="container">
    <h2>Mis Reservaciones</h2>

    <?php if (empty($reservaciones)): ?>
        <p style="text-align:center;">No tienes reservaciones registradas.</p>
    <?php else: ?>
        <?php foreach ($reservaciones as $r): ?>
            <div class="reserva">
                <p><strong>Nombre:</strong> <?= htmlspecialchars($r['nombre_cliente']) ?></p>
                <p><strong>Teléfono:</strong> <?= htmlspecialchars($r['telefono']) ?></p>
                <p><strong>Correo:</strong> <?= htmlspecialchars($r['correo']) ?></p>
                <p><strong>Fecha:</strong> <?= htmlspecialchars($r['fecha']) ?></p>
                <p><strong>Hora:</strong> <?= htmlspecialchars($r['hora']) ?></p>
                <p><strong>Zona:</strong> <?= htmlspecialchars($r['zona']) ?></p>
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
