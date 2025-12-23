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
    <a href="/?view=perfil"><img src="/assets/images/user.png" width="30"></a>
    <a href="/?action=logout"><img src="/assets/images/logout.png" width="30"></a>
</div>

<div class="container">
    <h1>Micheladas</h1>
    <div class="product-list">
        <!-- productos sin cambios -->
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalName"></h2>
        <img id="modalImg" style="width:100%">
        <p id="modalDesc"></p>
        <p id="modalPrice"></p>
    </div>
</div>

<script>
document.querySelectorAll('.product').forEach(item => {
    item.addEventListener('click', () => {
        document.getElementById('modalName').innerText = item.getAttribute('data-name');
        document.getElementById('modalImg').src = item.getAttribute('data-img');
        document.getElementById('modalDesc').innerText = item.getAttribute('data-desc');
        document.getElementById('modalPrice').innerText = item.getAttribute('data-price');
        document.getElementById('myModal').style.display = 'block';
    });
});
document.querySelector('.close').onclick = () => {
    document.getElementById('myModal').style.display = 'none';
};
window.onclick = e => {
    if (e.target == document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = 'none';
    }
};
</script>
<footer class="site-footer">
    <p>&copy; 2024 Restaurante-Bar El Arca. Todos los derechos reservados.</p>
</footer>

</body>
</html>
