<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$name=$_POST['contact-name'];
$phone=$_POST['contact-phone'];
$email=$_POST['contact-email'];
$contactservice=$_POST['contact-service'];
$contactmessage=$_POST['contact-message'];

$mail = new PHPMailer(true);
try {
$mail->isSMTP();
$mail->SMTPDebug   = 2;
$mail->DKIM_domain = '127.0.0.1';
$mail->Debugoutput = 'html';
$mail->Host        = "smtpout.secureserver.net";
$mail->Port        = 465;
$mail->SMTPAuth    = true;
$mail->Username    = "mail@islandxports.com";
$mail->Password    = "Islandexp2523";
$mail->SMTPSecure  = 'ssl';
$mail->setFrom('mail@islandxports.com', 'Island Export');
$mail->addAddress($email,$name);

$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $name."-".$phone;
$mail->Body    = "Service : "$contactservice."<br><br>".$contactmessage;
$mail->AltBody =  "Service : "$contactservice."<br><br>".$contactmessage;
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header("Location:https://islandxports.com/thankyou.html");
?>