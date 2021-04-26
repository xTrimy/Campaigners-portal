<?php

if (file_exists('classes/PHPMailer.php')) {
  require('classes/PHPMailer.php');
  require('classes/SMTP.php');
  require('classes/Exception.php');
} else {
  require('../classes/PHPMailer.php');
  require('../classes/SMTP.php');
  require('../classes/Exception.php');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mail {
        public static function sendMail($subject, $body, $address)
        {

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = "smtp.postmarkapp.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                $mail->Port = "587";
                $mail->Username = "3c5a14a8-f806-48b0-bd0f-57611f0cb942";
                $mail->Password = "3c5a14a8-f806-48b0-bd0f-57611f0cb942";
                $mail->Subject = $subject;
                $mail->setFrom('noreply@campaignersmiu.com');
                $mail->isHTML(true);
                $mail->Body = $body;
                $mail->addAddress($address);
                if ( $mail->send() ) {
                }
                $mail->smtpClose();

        }
}
