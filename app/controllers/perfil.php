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
$sql = "SELECT nombre, apellido_paterno, apellido_materno, correo, telefono FROM usuarios WHERE id = ?";

// Preparar la sentencia
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error al preparar la consulta: " . $conn->error);
}

// Vincular el parámetro
$stmt->bind_param("i", $idUsuario);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Obtener el resultado de la consulta
    $result = $stmt->get_result();
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
} else {
    header("Location: /?view=home");
    exit();
}

// Cerrar la sentencia
$stmt->close();

// Preparar la consulta SQL para obtener las reservaciones del usuario
$sql = "SELECT id, nombre_cliente, telefono_cliente, correo_cliente, fecha, hora, zona FROM reservaciones WHERE id_usuario = ?";

// Preparar la sentencia
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error al preparar la consulta: " . $conn->error);
}

// Vincular el parámetro
$stmt->bind_param("i", $idUsuario);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Obtener el resultado de la consulta
    $result = $stmt->get_result();
} else {
    header("Location: /?view=home");
    exit();
}

// Cerrar la sentencia
$stmt->close();

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    
    <link rel="stylesheet" href="styleInicio.css"> <!-- Enlazar el archivo CSS externo -->
    <style>
        /* Estilos generales */
        body {
            font-family: "Arial", sans-serif;
            margin: 0;
            padding: 0;
            background: url("fondoBorroso.jpg") no-repeat center center;
            background-size: cover;
            color: #f2efef;
            overflow-y: auto; /* Permite el desplazamiento vertical */
        }

        .content-wrapper {
            width: 100%;
            max-width: 1200px; /* Ajusta el ancho máximo según tus necesidades */
            padding: 20px;
            box-sizing: border-box;
            overflow: auto; /* Permite el desplazamiento interno si es necesario */
            margin: 0 auto; /* Centra el contenido horizontalmente */
        }

        /* Estilos para la nueva sección de perfil */
        .perfil-info {
            background-color: #fff;
            color: #000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .perfil-info h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .perfil-info p {
            margin: 10px 0;
            font-size: 18px;
        }

        /* Estilos para la nueva sección de reservaciones */
        .reservaciones {
            background-color: #fff;
            color: #000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .reservaciones h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .reservaciones p {
            margin: 10px 0;
            font-size: 18px;
        }

        .mensaje-flotante {
            width: 300px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
             position:relative;
             bottom: 100px; /* Ajustar la posición desde la parte inferior */
            left: 50%;
            transform: translateX(-50%); /* Centrar horizontalmente */
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .boton-aceptar {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .boton-aceptar:hover {
            background-color: #0056b3;
        }

        /* Estilos para el footer */
        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px 0;
            positionposition:relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="menu">
            <a href="/?view=home">Inicio</a>
            <a href="/?view=menu">Menú</a>
            <a href="/?view=reservaciones">Reservaciones</a>
            <a href="/?view=perfil">
                <img src="/assets/images/user.png" alt="Avatar de Usuario" class="avatar">
            </a>
            <a href="/?view=cerrar_sesion">
                <img src="/assets/images/logout.png" alt="Cerrar sesión" width="30px" height="30px">
            </a>
        </div>

        <div class="perfil-info">
            <h2>Perfil de Usuario</h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
            <p><strong>Apellido Paterno:</strong> <?php echo htmlspecialchars($apellido_paterno); ?></p>
            <p><strong>Apellido Materno:</strong> <?php echo htmlspecialchars($apellido_materno); ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($correo); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
        </div>

        <!-- Mostrar las reservaciones -->
        <div class="reservaciones">
            <h2>Reservaciones</h2>
            <?php
            // Mostrar las reservaciones del usuario
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p><strong>ID:</strong> " . htmlspecialchars($row["id"]) . "</p>";
                    echo "<p><strong>Nombre Cliente:</strong> " . htmlspecialchars($row["nombre_cliente"]) . "</p>";
                    echo "<p><strong>Teléfono Cliente:</strong> " . htmlspecialchars($row["telefono_cliente"]) . "</p>";
                    echo "<p><strong>Correo Cliente:</strong> " . htmlspecialchars($row["correo_cliente"]) . "</p>";
                    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($row["fecha"]) . "</p>";
                    echo "<p><strong>Hora:</strong> " . htmlspecialchars($row["hora"]) . "</p>";
                    echo "<p><strong>Zona:</strong> " . htmlspecialchars($row["zona"]) . "</p>";
                    echo "<br>";
                }
            } else {
                echo "No se encontraron reservaciones para este usuario.";
            }
            ?>
        </div>
    </div>
</body>
<footer>
    <p>© 2024 Todos los derechos reservados. Restaurante-Bar El Arca <br> <img src="inconoB.jpg" width="30px" height="30px" alt="Copyright"></p>
</footer>
</html>
