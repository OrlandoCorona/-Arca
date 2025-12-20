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
    <title>Otros y Extras - Restaurante-Bar El Arca</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?view=perfil">
        <img src="/assets/images/user.png" width="30">
    </a>
    <a href="/?action=logout">
        <img src="/assets/images/logout.png" width="30">
    </a>
</div>

<div class="container">
    <h1>Otros y Extras</h1>
    <div class="product-list">
        <div class="product" data-name="Guacamole" data-price="$50" data-desc="Delicioso guacamole fresco." data-img="/assets/images/guacamole.png">
            <h2>Guacamole</h2>
            <p>$50</p>
        </div>
        <div class="product" data-name="Nachos" data-price="$70" data-desc="Nachos con queso fundido." data-img="/assets/images/nachos.png">
            <h2>Nachos</h2>
            <p>$70</p>
        </div>
        <div class="product" data-name="Queso Fundido" data-price="$80" data-desc="Queso fundido para compartir." data-img="/assets/images/queso.png">
            <h2>Queso Fundido</h2>
            <p>$80</p>
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

</body>
</html>
