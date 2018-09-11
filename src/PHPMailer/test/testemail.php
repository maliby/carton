<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require '../class.phpmailer.php';

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = 'Телефон: ' . $_POST['phone'];
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 465;                    // set the SMTP server port
	$mail->Host       = "smtp.yandex.ru"; // SMTP server
	$mail->Username   = "maliby89600166304@yandex.ru";     // SMTP server username
	$mail->Password   = "Vikasel8";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->From       = "maliby89600166304@yandex.ru";
	$mail->FromName   = "First Last";

	$to = "maliby89600166304@yandex.ru";

	$mail->AddAddress($to);

	$mail->Subject  = "First PHPMailer Message";

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	echo 'Спасибо ваша заявка отправлена';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>