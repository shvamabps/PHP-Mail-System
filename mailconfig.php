<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require_once "phpmailer/PHPMailer.php";
    require_once "phpmailer/SMTP.php";
    require_once "phpmailer/Exception.php";

    $mail = new PHPMailer();

    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $senderemail;
    $mail->Password = $senderpassword;
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        echo "Email sent successfully to " . $email;
    } else {
        echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }
}
