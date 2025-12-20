

<p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
<p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo']) ?></p>

<?php if ($reservaciones): ?>
  <?php foreach ($reservaciones as $r): ?>
    <p><?= htmlspecialchars($r['fecha']) ?> - <?= htmlspecialchars($r['hora']) ?></p>
  <?php endforeach; ?>
<?php else: ?>
  <p>No hay reservaciones</p>
<?php endif; ?>
