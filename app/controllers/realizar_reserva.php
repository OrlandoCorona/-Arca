<?php
session_start();

// Verificar si se ha iniciado sesión
if (!isset($_SESSION["id_usuario"])) {
    // Si no se ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: /?view=login");
    exit();
}

// Habilitar la visualización de errores en PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el ID del usuario de la sesión
$idUsuario = $_SESSION["id_usuario"];

// Establecer las credenciales de la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Contraseña vacía
$dbname = "arca";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre_cliente = $_POST["nombre"];
    $telefono_cliente = $_POST["telefono"];
    $correo_cliente = $_POST["correo"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $zona = $_POST["zona"];

    // Validar la dirección de correo electrónico
    if (!filter_var($correo_cliente, FILTER_VALIDATE_EMAIL)) {
        die("La dirección de correo electrónico no es válida.");
    }

    // Preparar la consulta SQL para insertar la reserva en la base de datos
    $sql = "INSERT INTO reservaciones (id_usuario, nombre_cliente, telefono_cliente, correo_cliente, fecha, hora, zona) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("issssss", $idUsuario, $nombre_cliente, $telefono_cliente, $correo_cliente, $fecha, $hora, $zona);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Cerrar la sentencia
        $stmt->close();
        // Envío de correo electrónico
        $mail = new PHPMailer(true); // Instanciar un objeto PHPMailer

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'rodriguezromanojoseantonio@gmail.com'; //SMTP username
            //restaurantebarArca
            $mail->Password   = 'hqwa nokd pnzj udkh';                  //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable explicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to
            
            // Configurar remitente y destinatario
            $mail->setFrom('rodriguezromanojoseantonio@gmail.com', 'Restaurante Bar- El Arca');
            $mail->addAddress($correo_cliente, $nombre_cliente);        // Correo y nombre del destinatario
            // Configurar el correo electrónico como HTML
            $mail->isHTML(true);
            // Asunto del correo electrónico
            $mail->Subject = 'Confirmación de Reserva'; // Aquí coloca el texto completo con acentos y caracteres especiales si es necesario
            $mail->Subject = '=?UTF-8?B?' . base64_encode('Confirmación de Reserva') . '?='; // Codificación UTF-8 para caracteres especiales
            // Cuerpo del correo electrónico en HTML
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Confirmación de Reserva</title>
                <link rel="stylesheet" href="styleInicio.css"> <!-- Enlazar el archivo CSS externo -->

                <style>
                    /* Estilos generales */
                    body {
                        font-family: "Arial", sans-serif;
                        margin: 0;
                        padding: 0;
                        background: url("https://scontent.fpbc4-1.fna.fbcdn.net/v/t39.30808-6/415070902_934332435017269_9104447290964671712_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH-7HnIcdQl7VPHqM3V4nhV3UykusB1wRTdTKS6wHXBFJBojTbuLIR9FgjRB8-1-K8RbP6Exyvqd7wsuTOok1TU&_nc_ohc=n4TSlk0rklUAb5rPgmg&_nc_ht=scontent.fpbc4-1.fna&oh=00_AfDk4Gl7xnWTZjybvII9hmMkeFWbSOwSrsXXIDFZ52-OAQ&oe=66217847") center center/160px fixed; /* Ajuste del fondo */
                        color: #f2efef; /* Color del texto */
                    }

                    /* Estilo para el contenedor del texto */
                    .text-container {
                        background-color: rgba(0, 0, 0, 0.5); /* Fondo negro semi-transparente */
                        padding: 20px; /* Espaciado interno */
                        border-radius: 10px; /* Bordes redondeados */
                    }

                    /* Contenedor principal */
                    .container {
                        max-width: 1200px;
                        margin: 0 auto;
                        padding: 20px;
                    }

                    /* Encabezado */
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    .header h1 {
                        font-size: 36px;
                        font-weight: bold;
                        color: #f3eeee;
                    }

                    .header p {
                        font-size: 18px;
                        color: #fefafa;
                    }

                    /* Menú de navegación */
                    .menu {
                        background-color: #333;
                        color: white;
                        text-align: center;
                        padding: 10px 0;
                    }

                    .menu a {
                        color: white;
                        text-decoration: none;
                        margin: 0 20px;
                        font-size: 18px;
                    }

                    .menu a:hover {
                        text-decoration: underline;
                    }

                    /* Contenido principal */
                    .content {
                        text-align: center;
                        margin-bottom: 40px;
                    }

                    .content .card {
                        background: rgb(0, 0, 0) url(editables/bg-verde.png) bottom right no-repeat;
                        border: none;
                        padding: 20px;
                        margin-bottom: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    .content .card h2 {
                        text-align: center;
                        font-size: 24px;
                        font-weight: bold;
                        color: #ffffff;
                    }

                    .content .card p {
                        text-justify: justify;
                        font-size: 18px;
                        color: #ffffff;
                    }

                    .content .card img {
                        max-width: 100%;
                        height: auto;
                        margin-top: 20px;
                        border-radius: 5px;
                    }

                    /* Estilos para las promociones */
                    .promociones {
                        display: flex;
                        justify-content: center;
                        margin-bottom: 20px;
                    }

                    .promocion-container {
                        text-align: center;
                        margin-right: 20px;
                    }

                    .promocion-container img {
                        max-width: 150px;
                        height: auto;
                        border-radius: 5px;
                    }

                    /* Estilos para la imagen adicional */
                    .imagen-adicional {
                        margin-top: 40px;
                    }

                    .imagen-adicional img {
                        max-width: 300px; /* Ajusta el ancho deseado para la imagen adicional */
                        height: auto;
                        border-radius: 10px;
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
                <div class="container">
                    <div class="content">
                        <div class="header">
                            <div class="card">
                                <h1>Restaurante-Bar El Arca</h1>
                                <img src="https://scontent.fpbc4-1.fna.fbcdn.net/v/t39.30808-6/452738504_884782967003640_3655966942076179277_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=NbXYm3nuepAQ7kNvgGlwja1&_nc_ht=scontent.fpbc4-1.fna&oh=00_AYDd9hKsXBFcplQmGXnOtqF5NVzRfzSLUTQP1TwJFTxl9A&oe=66A68E60" width="80px" height="80px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="content">
                        <div class="header">
                            <div class="card">
                                <p>Usted ha realizado una reserva con éxito. Aquí tiene su información:</p>
                                <ul>
                                    <li><h3 style="color: white"><strong>Nombre:</strong> ' . $nombre_cliente . '</h3></li>
                                    <li><h3 style="color: white"><strong>Teléfono:</strong> ' . $telefono_cliente . '</h3></li>
                                    <li><h3 style="color: white"><strong>Correo:</strong> ' . $correo_cliente . '</h3></li>
                                    <li><h3 style="color: white"><strong>Fecha:</strong> ' . $fecha . '</h3></li>
                                    <li><h3 style="color: white"><strong>Hora:</strong> ' . $hora . '</h3></li>
                                    <li><h3 style="color: white"><strong>Zona:</strong> ' . $zona . '</h3></li>
                                </ul>
                                <img src="https://scontent.fpbc4-1.fna.fbcdn.net/v/t39.30808-6/452515201_884790003669603_8691976088494568247_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=127cfc&_nc_ohc=Nc7sDbREKnEQ7kNvgEczDVI&_nc_ht=scontent.fpbc4-1.fna&oh=00_AYCilkpp4bn-qoi7J5TfhK_wqDliUBwyHrSxP_v5W7tpbA&oe=66A67A6B" width="200px" height="200px">
                                <p>Gracias por su preferencia. (No responda a este mensaje)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <footer>
            <p style="background-color: black; color:white; text-align: center;">© 2024 Todos los derechos reservados. Restaurante-Bar El Arca  <br>  <img src="https://scontent.fpbc4-1.fna.fbcdn.net/v/t39.30808-6/452738504_884782967003640_3655966942076179277_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=NbXYm3nuepAQ7kNvgGlwja1&_nc_ht=scontent.fpbc4-1.fna&oh=00_AYDd9hKsXBFcplQmGXnOtqF5NVzRfzSLUTQP1TwJFTxl9A&oe=66A68E60" width="30px" height="30px" alt="Copyright"></p>
            </footer>
            </html>

            ';
            // Enviar el correo electrónico
            $mail->send();
            header("Location: /?view=reservation-success");
            exit(); // Agregar esta línea para evitar que el script siga ejecutándose después de la redirección
        } catch (Exception $e) {
            header("Location: /?view=home");
            exit();
        }
    } else {
        header("Location: /?view=home");
        exit();
    }
}

// Cerrar la conexión
$conn->close();
?>
