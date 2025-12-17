<?php
session_start();

// Verificar si se ha iniciado sesión
if (!isset($_SESSION["id_usuario"])) {
    // Si no se ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: /?view=login");
    exit();
}

// Obtener el ID del usuario de la sesión
$idUsuario = $_SESSION["id_usuario"];

// Establecer las credenciales de la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Contraseña vacía
$dbname = "arca";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para obtener la información del perfil del usuario
$sql = "SELECT nombre, apellido_paterno, apellido_materno, correo, telefono FROM usuarios WHERE id = $idUsuario";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar la información del perfil del usuario
    $row = $result->fetch_assoc();
    $nombre = $row["nombre"];
    $apellido_paterno = $row["apellido_paterno"];
    $apellido_materno = $row["apellido_materno"];
    $correo = $row["correo"];
    $telefono = $row["telefono"];
} else {
    header("Location: /?view=login");
    exit();
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones</title>
    <link rel="stylesheet" href="stylesReservaciones.css"> <!-- Enlazar el archivo CSS externo -->        
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!-- Enlazar el CSS de jQuery UI -->
    <style>
              /* Estilos generales */
      body {
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
        background: url("fondoBorroso.jpg") no-repeat center center; /* Ajuste del fondo */
        background-size: cover; /* Ajusta la imagen de fondo para que cubra toda la pantalla */
        color: black; /* Color del texto */
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        overflow: hidden;
      }
                            /* Estilos para el footer */
                            footer {
                        background-color: black;
                        color: white;
                        text-align: center;
                        padding: 10px 0;
                        position: fixed;
                        bottom: 0;
                        width: 100%;
                      }
    </style>
</head>
<body>
    <div class="menu">
        <a href="/?view=home">Inicio</a>
        <a href="/?view=menu">Menú</a>
        <a href="reservaciones.php";>Reservaciones</a>
        <a href="perfil.php">
            <img src="user.png" alt="Avatar de Usuario" class="avatar">
        </a>
        <a href="cerrar_sesion.php">
                <img src="logout.png" alt="Cerrar sesion" class="cerrar" width="30px" height="30px">
        </a>
    </div>
    <div class="container">
        <div class="content">
            <div class="reservas">
                <h2>Reservaciones</h2>
                <br><br><br>
                <form action="realizar_reserva.php" method="POST">
                    <div class="input-group">
                        <label for="nombre"><strong>Nombre:</strong></label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="telefono"><strong>Teléfono:</strong></label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="correo"><strong>Correo:</strong></label>
                        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="fecha"><strong>Fecha:</strong></label>
                        <input type="text" id="fecha" name="fecha" autocomplete="off" required> <!-- Este será el campo de fecha -->
                    </div>

                    <div class="input-group">
                        <label for="hora"><strong>Hora:</strong></label>
                        <select id="hora" name="hora" required>
                            <!-- Las opciones de hora se generarán dinámicamente según el día seleccionado -->
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="zona"><strong>Zona:</strong></label>
                        <select id="zona" name="zona" onchange="cambiarImagen()" required>
                            <option value="interior">Interior</option>
                            <option value="terraza">Terraza</option>
                            <option value="jardin">Jardín</option>
                        </select>
                    </div>
                    <div class="input-group">
                    </div>
                    <div class="input-group">
                    </div>
                    <img id="imagen-zona" src="imagenInterior.png" alt="imagen de la zona" class="zona-imagen" style="width: 400px; height: 200px;">
                    <button type="submit" class="boton-llamativo" style="background-color:blue;">Realizar Reserva</button> <!-- Botón con estilo llamativo -->
                </form>
            </div>
            
            <div class="informacion">
                <h2>Información del Lugar</h2>
                <!-- Código del mapa incrustado -->
                <p>
                    <style>
                        .imagen-centrada {
                            text-align: center;
                        }
                
                        .imagen-centrada img {
                            max-width: 8%;
                            height: auto;
                        }
                    </style>
                    <div class="imagen-centrada">
                        <img src="horario.png" alt="horario">
                    </div>
                </p>
                <div class="reservas">
                    <ul class="horas-list">
                        <li><strong>Lunes:</strong> 12–7 p.m.</li>
                        <li><strong>Martes:</strong> 12–7 p.m.</li>
                        <li><strong>Miércoles:</strong> 12–7 p.m.</li>
                        <li><strong>Jueves:</strong> 12–7 p.m.</li>
                        <li><strong>Viernes:</strong> 12–7 p.m.</li>
                        <li><strong>Sábado:</strong> 12–8 p.m.</li>
                        <li><strong>Domingo:</strong> 12–8 p.m.</li>
                    </ul>
                </div>
                <div class="imagen-centrada">
                    <a href="https://www.facebook.com/profile.php?id=100053215637189&mibextid=ZbWKwL" target="_blank">
                        <img src="facebook.png" alt="Facebook">
                    </a>
                    
                    <a href="https://www.instagram.com/elarcarestaurantebar?igsh=bHBkdWtoYTVpamQ2" target="_blank">
                        <img src="instagram.png" alt="Instagram">
                    </a>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60244.1248635601!2d-98.31089973449704!3d19.314616260349332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfd939075e3a53%3A0x2fbe2e36dd1ecd42!2sEl%20Arca!5e0!3m2!1ses-419!2smx!4v1709605075741!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mapa"></iframe>
                <p>Ocotlán Chiautempan 101, Ocotlán, 90100 San Gabriel Cuauhtla, Tlax.</p>
            </div>
                       
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> <!-- Incluir jQuery UI -->

    <script>
        $(document).ready(function() {
            var horasDisponibles = {
                "0": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m.", "08:00 p.m."], // Domingo
                "1": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m."], // Lunes
                "2": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m."], // Martes
                "3": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m."], // Miércoles
                "4": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m."], // Jueves
                "5": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m."], // Viernes
                "6": ["12:00 p.m.", "01:00 p.m.", "02:00 p.m.", "03:00 p.m.", "04:00 p.m.", "05:00 p.m.", "06:00 p.m.", "07:00 p.m.", "08:00 p.m."] // Sábado
           
            };
            
            var horaSelect = $("#hora");
            var fechaInput = $("#fecha");
            fechaInput.datepicker({
                dateFormat: "yy-mm-dd", // Formato de la fecha
                dayNamesMin: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"], // Nombres cortos de los días
                onSelect: function(dateText, inst) {
                    var selectedDate = new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay);
                    var dayOfWeek = selectedDate.getDay(); // Obtener el día de la semana (0 = Domingo, 1 = Lunes, ..., 6 = Sábado)
                    horaSelect.empty();
                    var dayHours = horasDisponibles[dayOfWeek.toString()];
                    if (dayHours) {
                        dayHours.forEach(function(hour) {
                            horaSelect.append('<option value="' + hour + '">' + hour + '</option>');
                        });
                    } else {
                        horaSelect.append('<option value="">No hay horas disponibles</option>');
                    }
                }
            });
        });
    </script>

    <script>
        function cambiarImagen() {
            var zonaSelect = document.getElementById("zona");
            var imagenZona = document.getElementById("imagen-zona");
            var selectedOption = zonaSelect.options[zonaSelect.selectedIndex].value;
            if (selectedOption === "interior") {
                imagenZona.src = "imgInterior.png";
            } else if (selectedOption === "terraza") {
                imagenZona.src = "imgTerraza.png";
            } else if (selectedOption === "jardin") {
                imagenZona.src = "imgJardin.png";
            }
        }
    </script>
</body>
<footer>
    <p style="background-color: black; color:white; text-align: center;">© 2024 Todos los derechos reservados. Restaurante-Bar El Arca  <br>  <img src="inconoB.jpg" width="30px" height="30px" alt="Copyright"></p>
  </footer>
</html>
