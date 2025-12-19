<?php

$name = $_POST["name"];
$email = $_POST["email"];
$nim = $_POST["nim"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port =  587;

$mail->Username = "nadzif.hasan3work@gmail.com";
$mail->Password = "hygj bjog nhtm rvwf";

$mail->setFrom($email, $name);
$mail->addAddress("nadzif.hasan3work@gmail.com", "nadzif");

$mail->Subject = $subject;
$mail->Body = 
    "Pesan dari Form Kontak MBC:\n\n" .
    "Nama     : $name\n\r" .
    "NIM      : $nim\n\r" .
    "Email    : $email\n\n\r" .
    "Pesan:\n$message";;

$mail->send();

echo "email";

?>