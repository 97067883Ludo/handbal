<?php

$recipient = $_GET['recipient'];
$subject = $_GET['subject'];
$message = $_GET['message'];
$file = $_GET['file'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ludotielbeke@outlook.com';                     //SMTP username
    $mail->Password   = 'Ludo123456';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail->Username);
    $mail->addAddress($recipient);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->addAttachment($file, 'Schemalijst.pdf');         //Add attachments

    $mail->send();
    echo '<div class="alert alert-success" role="alert">
        De mail is succesvol verstuurd
        </div>
    ';
} catch (Exception $e) {

    echo '<div class="alert alert-danger" role="alert">
        Message could not be sent. Mailer Error: {'.$mail->ErrorInfo.'}
        </div>
        ';
}
?>