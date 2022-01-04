<?php

$recipient = $_GET['recipient'];
$subject = $_GET['subject'];
$message = $_GET['message'];
$file = $_GET['file'];


$mailSettings = file_get_contents('config.json');

$mailSettings = json_decode($mailSettings, true);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    //get from settings.json
    $mail->isSMTP();
    $mail->Host       = $mailSettings['mailSettings'][0]['host'];
    $mail->SMTPAuth   = $mailSettings['mailSettings'][0]['SMTPAuth'];
    $mail->Username   = $mailSettings['mailSettings'][0]['Username'];
    $mail->Password   = $mailSettings['mailSettings'][0]['Password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $mailSettings['mailSettings'][0]['Port'];

    //Recipients
    $mail->setFrom($mail->Username);
    $mail->addAddress($recipient);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->addAttachment($file, 'Schemalijst.pdf');
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