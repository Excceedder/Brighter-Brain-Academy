<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp.titan.email';
$mail->SMTPAuth   = true;
$mail->Username   = 'info@brighterbrainacademy.com';
$mail->Password   = 'Southecured@072##@!';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;
$mail->setFrom($mail->Username, 'Brighter Brain Academy');
$mail->isHTML(true);
