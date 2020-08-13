<?php
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];
if(isset( $_POST['subject']))
$subject = $_POST['subject'];

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 //Load composer's autoloader
require '../PHPMailer/PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer/PHPMailer.php';
require '../PHPMailer/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$correo_mio = 'tucorreo@gmail.com';
$password = 'tupassword';
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $correo_mio;                     // SMTP username
    $mail->Password   = $password;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correo_mio, 'StyleShop');
    $mail->addAddress($correo_mio, 'StyleShop');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo($correo_mio', 'Information');
   

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "<p>Nombre: ".$name."</p><p>Email Cliente:".$email. "</p><p>Asunto: ".$subject."</p><p>Mensaje: ".$message."</p>";
    //$mail->AltBody = ;

    $mail->send();
    echo 'Message has been sent';
    header("Location: ../contacts.php");
    die();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>