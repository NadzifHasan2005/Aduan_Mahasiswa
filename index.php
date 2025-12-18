<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.example.com";
        $mail->Username = "you@example.com";
        $mail->Password = "password";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->CharSet = "UTF-8";
        $mail->setFrom("you@example.com", "Website Contact");
        $mail->addReplyTo($email, $name);
        $mail->addAddress("nadzif.hasan3work@gmail.com", "Nadzif");

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "Pesan berhasil dikirim";
    } catch (Exception $e) {
        echo "Pesan gagal dikirim: {$mail->ErrorInfo}";
    }
}
