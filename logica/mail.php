<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($subject,$body,$email,$name, $html = false){
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'cesarivan25479@gmail.com';
    $phpmailer->Password = 'rsazrgftzsoweiuj';


    //Aqui estamos Añadiendo destinatarios
    $phpmailer->setFrom('from@example.com', 'Mailer');
    $phpmailer->addAddress($email, $name);     //Add a recipient

    //Definiendo el contenido de mi email
    $phpmailer->isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    //mandar el correo
    $phpmailer->send();
}
?>