<?php
require_once('../clases/medoo.php');
$password = $_POST['password'];
$confirmation = $_POST['confirm_password'];
if($password== $confirmation)
{
    $pass = md5($password);
    $username= $_POST['username'];
    $database = new medoo();
    $datas = $database->insert("user",[
    "username" => $username,
    "password" => $pass,
    "correo" => $_POST['id_email_address']
    ]);

    $object = "Informacion de cuenta nueva";
        $sistem = "sam_edreiuc@live.com";
        $to = $_POST['id_email_address'];
       
        $email_content = "Username: $username". "\r\n";
        $email_content .= "Nuevo password: $password". "\r\n";
        $email_content .= "mensaje:". "\r\n". "\r\n". "Ingresa con tu nueva cuenta";

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


    //var_dump($datas);
    header('Location:loginform.php?bravo=1');
}
else
{
    header('Location:loginform.php?passerror=1');
}
    

?>