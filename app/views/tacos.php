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
    <h1>Tacos</h1>
    <div class="product-list">
        <div class="product" data-name="Taco de Pastor" data-price="$25" data-desc="Tacos de pastor." data-img="/assets/images/pastor.png">
            <h2>Taco de Pastor</h2>
            <p>$25</p>
        </div>
        <div class="product" data-name="Taco de Bistec" data-price="$30" data-desc="Tacos de bistec." data-img="/assets/images/bistec.png">
            <h2>Taco de Bistec</h2>
            <p>$30</p>
        </div>
        <div class="product" data-name="Taco de Asada" data-price="$25" data-desc="Tacos de asada." data-img="/assets/images/asada.png">
            <h2>Taco de Asada</h2>
            <p>$25</p>
        </div>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalName"></h2>
        <img id="modalImg">
        <p id="modalDesc"></p>
        <p id="modalPrice"></p>
    </div>
</div>

<script>
const products = document.querySelectorAll('.product');

products.forEach(item => {
    item.addEventListener('click', () => {
        document.getElementById('modalName').innerText = item.dataset.name;
        document.getElementById('modalImg').src = item.dataset.img;
        document.getElementById('modalDesc').innerText = item.dataset.desc;
        document.getElementById('modalPrice').innerText = item.dataset.price;
        document.getElementById('myModal').style.display = 'block';
    });
});

document.querySelector('.close').onclick = () => {
    document.getElementById('myModal').style.display = 'none';
};

window.onclick = e => {
    if (e.target === document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = 'none';
    }
};
</script>
<footer>
    <p style="background-color: black; color:white; text-align: center;">
        &copy; 2024 Restaurante-Bar El Arca. Todos los derechos reservados.
    </p>
</body>
</html>
