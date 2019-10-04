<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// This path to PHPMailer should be correct
 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$resend_url = 'index.html'
 
try {
    //Server settings
 
    $mail->SMTPDebug = 2; 
    // Enable debug output
 
    $mail->isSMTP();
    // Set mailer to use SMTP
 
    $mail->Host       = 'smtp.gmail.ru';
    // Specify main and backup SMTP servers ex: 'smtp.gmail.com' for gmail
 
    $mail->SMTPAuth   = true;
    // Enable SMTP authentication
    
    $mail->Username   = 'kingdomdev.io@gmail.com';
    // SMTP username/ Email address
 
    $mail->Password   = '$346&dG89';
    // SMTP password for your Email
 
    $mail->SMTPSecure = 'tls';
    // Enable TLS encryption, `ssl` also accepted
 
    $mail->Port       = 587;
    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('kingdomdev.io@gmail.com', 'Admin');
 
    $mail->addAddress('kingdomdev.io@gmail.com', 'Tom');
    // Add a recipient
 
    // $mail->addAddress('nick@demo.com');
    // Name is optional
 
    // $mail->addReplyTo('info@demo.com', 'Information');
 
    // $mail->addCC('cc@demo.com');
    // $mail->addBCC('bcc@demo.com');
 
    // Attachments
    // $mail->addAttachment('/var/tmp/new_file.tar.gz');
    // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new_img.jpg');
    // Optional name
 
    // Content
    $mail->isHTML(true);
    // Set email format to HTML
 
    $mail->Subject = 'Заявка с сайта';
    $mail->Body    = "$user_name отправил заявку \n message: $user_message \n номер телефона: $user_phone \n email: $user_email";
 
    $mail->send();
    echo 'Email has been sent';
    header("Location: /$resend_url");
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 
?>