<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botellas y Copeo - Restaurante-Bar El Arca</title>

    <link rel="stylesheet" href="/assets/css/styles.css">

    <style>
        :root{
            --primary:#007bff;
            --primary-dark:#0056b3;
            --bg-soft: rgba(255,255,255,0.92);
            --text-dark:#0b1a2b;
        }

        body{
            font-family: Arial, sans-serif;
            margin:0;
            padding:0;
            background: url('/assets/images/fondoBorroso.jpg') center/cover no-repeat;
            color:#f2efef;
            min-height:100vh;
        }

        .menu{
            background: linear-gradient(90deg,#071428,#0b1a2b);
            color:#fff;
            text-align:center;
            padding:10px 0;
            width:100%;
            position:relative;
            z-index:20;
        }

        .menu a{
            color:#fff;
            text-decoration:none;
            margin:0 16px;
            font-size:18px;
        }

        .menu a img{
            vertical-align:middle;
        }

        .container{
            max-width:1200px;
            margin:0 auto;
            padding:80px 20px 40px;
        }

        h1{
            text-align:center;
            margin-bottom:30px;
        }

        .product-list{
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
            gap:14px;
        }

        .product{
            background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(0,0,0,0.35));
            padding:20px;
            border-radius:10px;
            width:210px;
            text-align:center;
            cursor:pointer;
            transition:transform .25s ease, box-shadow .2s;
        }

        .product:hover{
            transform:translateY(-6px);
            box-shadow:0 8px 24px rgba(3,12,30,0.25);
        }

        .product h2{
            font-size:18px;
            margin-bottom:8px;
        }

        .product p{
            margin:4px 0;
        }

        .modal{
            display:none;
            position:fixed;
            inset:0;
            background: rgba(0,0,0,0.45);
            align-items:center;
            justify-content:center;
            z-index:100;
        }

        .modal-content{
            background: linear-gradient(135deg,var(--bg-soft), rgba(240,246,255,0.86));
            backdrop-filter: blur(8px);
            padding:20px;
            border-radius:12px;
            width:90%;
            max-width:520px;
            text-align:center;
            color:var(--text-dark);
        }

        .modal-content img{
            width:100%;
            border-radius:10px;
            margin-bottom:12px;
        }

        .close{
            float:right;
            font-size:28px;
            font-weight:bold;
            cursor:pointer;
        }

        footer{
            background:black;
            color:white;
            text-align:center;
            padding:12px 0;
            margin-top:40px;
        }
    </style>
</head>

<body>

<div class="menu">
    <a href="/?view=home">Inicio</a>
    <a href="/?view=menu">Menú</a>
    <a href="/?view=reservaciones">Reservaciones</a>
    <a href="/?view=perfil">
        <img src="/assets/images/user.png" width="30" height="30" alt="Perfil">
    </a>
    <a href="/?action=logout">
        <img src="/assets/images/logout.png" width="30" height="30" alt="Salir">
    </a>
</div>

<div class="container">
    <h1>Botellas y Copeo</h1>

    <div class="product-list">
        <div class="product" data-name="Tequila Don Julio" data-price="$1,200" data-desc="Botella 750ml" data-img="/assets/images/donjulio.png">
            <h2>Don Julio</h2>
            <p>$1,200</p>
        </div>

        <div class="product" data-name="Buchanan's 12" data-price="$1,400" data-desc="Whisky 750ml" data-img="/assets/images/buchanans.png">
            <h2>Buchanan's 12</h2>
            <p>$1,400</p>
        </div>

        <div class="product" data-name="José Cuervo Especial" data-price="$900" data-desc="Tequila 750ml" data-img="/assets/images/cuervo.png">
            <h2>José Cuervo</h2>
            <p>$900</p>
        </div>

        <div class="product" data-name="Bacardí Blanco" data-price="$850" data-desc="Ron 750ml" data-img="/assets/images/bacardi.png">
            <h2>Bacardí</h2>
            <p>$850</p>
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalName"></h2>
        <img id="modalImg" src="">
        <p id="modalDesc"></p>
        <p id="modalPrice"></p>
    </div>
</div>

<footer>
    <p>
        © 2024 Restaurante-Bar El Arca<br>
        <img src="/assets/images/inconoB.jpg" width="30" height="30" alt="El Arca">
    </p>
</footer>

<script>
document.querySelectorAll('.product').forEach(item => {
    item.addEventListener('click', () => {
        document.getElementById('modalName').innerText = item.dataset.name;
        document.getElementById('modalImg').src = item.dataset.img;
        document.getElementById('modalDesc').innerText = item.dataset.desc;
        document.getElementById('modalPrice').innerText = item.dataset.price;
        document.getElementById('myModal').style.display = 'flex';
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
