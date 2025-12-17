<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rodriguezromanojoseantonio@gmail.com'; //SMTP username
    $mail->Password   = 'hqwa nokd pnzj udkh';                  //SMTP password
    //restaurantebarArca                        -snem zbdu urto fvxj
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable explicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 for STARTTLS

    //Recipients
    $mail->setFrom('rodriguezromanojoseantonio@gmail.com', 'El Arca');
    $mail->addAddress('josearr.uptx@gmail.com', 'Jose');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reservacion Exitosa';
    $mail->Body    = 'Hola';

    $mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}
