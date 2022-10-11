<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/vendor/autoload.php';


$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 1;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com';					
	$mail->SMTPAuth = false;			
	$mail->Username = 'contact.islandexports@gmail.com';				
	$mail->Password = 'Exprt@007';	
    $mail->SMTPSecure = 'ssl';											
	$mail->Port	 = 465;

	$mail->setFrom('sayyidsalman.info@gmail.com', 'Salman');		
	$mail->addAddress('me.salmanponnani@gmail.com');

	$mail->isHTML(true);								
	$mail->Subject = 'Subject';
	$mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    echo "Mail hd!";
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "ok";
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
