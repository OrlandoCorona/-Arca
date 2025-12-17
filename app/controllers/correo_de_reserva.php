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

// Verificar si se han recibido los datos del formulario
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

    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
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
        // Envío de correo electrónico
        $mail = new PHPMailer(true); // Instanciar un objeto PHPMailer

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'rodriguezromanojoseantonio@gmail.com'; //SMTP username
            $mail->Password   = 'hqwa nokd pnzj udkh';                  //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable explicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to
            
            // Configurar remitente y destinatario
            $mail->setFrom('rodriguezromanojoseantonio@gmail.com', 'Restaurante Bar- El Arca');
            $mail->addAddress($correo_cliente, $nombre_cliente);        // Correo y nombre del destinatario
            $mail->Subject = 'Confirmación de Reserva';
            $mail->Body = "¡Hola!\n\nSe ha realizado una reserva con éxito. Información de la Reserva:\n\nNombre: $nombre_cliente\nTeléfono: $telefono_cliente\nCorreo: $correo_cliente\nFecha: $fecha\nHora: $hora\nZona: $zona\n\nGracias por su preferencia(No responder a este mensaje).";

            // Enviar el correo electrónico
            $mail->send();

            header("Location: /?view=reservation-success");
            exit(); // Agregar esta línea para evitar que el script siga ejecutándose después de la redirección
        } catch (Exception $e) {
            echo "Error al enviar el correo de confirmación: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error al realizar la reserva: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se han recibido datos del formulario, redirigir a alguna página de error
    header("Location: /?view=home");
    exit();
}
?>
