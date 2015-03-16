<?php
require_once '../clases/medoo.php';
$database = new medoo();

function randomPassword() 
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //declara pass como un arreglo
    $alphaLength = strlen($alphabet) - 1; //calcula la talla de cadena menos uno para iniciar desde cero
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength); 
        $pass[] = $alphabet[$n]; //construye un arreglo con valores random de n
    }
    return implode($pass); //regresa el arreglo como un string
}

  $newpass = randomPassword();
  echo $newpass;
  $encriptpass = md5($newpass);

  if(isset($_POST["email"]))
    {
        $datasemail = $database->select("user", "*", [
        "correo" => $_POST['email']
      ]);

      if(!empty($datasemail))
      {
        $datas = $database->update("user", [
        "password" => $encriptpass
        ],[
        "AND" => [
        "correo" => $_POST['email']
        ]
        ]);
        //var_dump($datas);
        $data=$datasemail[0];
        $username = $data['username'];
        //echo $username;

    
        $object = "Restauracion de cuenta";
        $sistem = "sam_edreiuc@live.com";
        $to = $_POST['email'];
       
        $email_content = "Username: $username". "\r\n";
        $email_content .= "Nuevo password: $newpass". "\r\n";
        $email_content .= "mensaje:". "\r\n". "\r\n". "Ingresa con tu nuevo password";

        require_once '../lib/swiftmailer/lib/swift_required.php';

        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('rideconmigo')
            ->setPassword('rc2014gds');


        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance($object)
          ->setFrom(array($sistem))
          ->setTo(array($to))
          ->setBody($email_content);

        $result = $mailer->send($message);

        header('Location:loginform.php?envio=1');
      }
      else 
      {
        header('Location:loginform.php?exist=1');
      }
    }
?>