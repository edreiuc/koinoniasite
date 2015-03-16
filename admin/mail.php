<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['nombreDoc']) ) {
    header('Location: consulta.php'); exit;
}
	
// get the posted data'
$nombre="Sistema laboratorio";
$nombreDoc = $_POST['nombreDoc'];
$nombrePac = $_POST['nombrePac'];
$mensaje = "Se han publicado el siguiente resultado: ".$_POST['analisis'];
$link =$_POST['link'];
$object = "Resultados de analisis listos";
$to1=$_POST['mailDoc'];
$to2=$_POST['mailPac'];

// write the email content to doctor
$email_content = "Dr. Dra.: $nombreDoc". "\r\n";
$email_content .= "mensaje:". "\r\n". "\r\n". $mensaje."\r\n"."del paciente :".$nombrePac."\r\n";
$email_content .= "consulte los resultados dando click a este link: ".$link;
//aqui el link para visualizar el resultado

// write the email content to pacient
$email_contenu = "Sr. Sra. : $nombrePac". "\r\n";
$email_contenu .= "mensaje:". "\r\n". "\r\n". $mensaje."\r\n"."\r\n";
$email_contenu .= "consulte los resultados dando click a este link: ".$link;
//aqui el link para visualizar el resultado

require_once '../lib/swiftmailer/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")

      ->setUsername('rideconmigo')
      ->setPassword('rc2014gds');


$mailer = Swift_Mailer::newInstance($transport);

//si doctor no esta asignado solo envia resultados a paciente
if($_POST['nombreDoc']=='doctor no asignado')
{
	$message2 = Swift_Message::newInstance($object)
	  ->setFrom(array($to2 => $nombre))
	  ->setTo(array($to2))
	  ->setBody($email_contenu);

	$result = $mailer->send($message2);
}
else
{
	$message = Swift_Message::newInstance($object)
	  ->setFrom(array($to1 => $nombre))
	  ->setTo(array($to1))
	  ->setBody($email_content);

	$message2 = Swift_Message::newInstance($object)
	  ->setFrom(array($to2 => $nombre))
	  ->setTo(array($to2))
	  ->setBody($email_contenu);

	$resul = $mailer->send($message);
	$result = $mailer->send($message2);

}




    //header('Location: contacto.php?envio=ok'); exit;

?>