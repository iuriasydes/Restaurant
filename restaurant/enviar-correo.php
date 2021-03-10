<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: ".$nombre."<br>Correo: ".$correo."<br>Telefono: ".$telefono."<br>Mensaje: ".$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'iuriasydes@gmail.com';                     //SMTP username
    $mail->Password   = 'Japo1500';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('iuriassydes@gmail.com', 'Atencion a Clientes');
    $mail->addAddress('iuriasvc@outlook.com', 'Japo');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mensaje de Tu Restaurant';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
    $mail->AltBody = 'Mensaje alternativo';

    $mail->send();
    echo '<script>
        alert("Mensaje enviado correctamente");
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "A ocurrido un error al intentar enviar el mensaje: {$mail->ErrorInfo}";
}

?>