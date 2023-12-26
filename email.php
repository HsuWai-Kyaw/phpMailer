<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
     $name = htmlentities($_POST['name']);
     $email = htmlentities($_POST['email']);
     $subject = htmlentities($_POST['subject']);
     $message = htmlentities($_POST['message']);

     $mail = new PHPMailer(true);
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'qamanager03@gmail.com';
     $mail->Password = 'hgeeyubeawvsseve';
     $mail->Port = 465;
     $mail->SMTPSecure = 'ssl';
     $mail->isHTML(true);

     // Set "from" name and email
     $mail->setFrom($email, $name);
     $mail->addReplyTo($email, $name);

     // Set "to" name and email
     $mail->addAddress('qamanager03@gmail.com', 'QAmanager');

     $mail->Subject = $subject;
     $mail->Body = $message;

     try {
          // Try sending the email
          $mail->send();
          header("Location: ./response.php");
     } catch (Exception $e) {
          // Handle errors
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
}
