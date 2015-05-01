<?php
require_once '../clases/medoo.php';
$database = new medoo();

$username =$_POST['username'];
$pwd =$_POST['password'];
$pass = md5($pwd);

$datas = $database->select("grupo",["password","nombre","foto"], [
	"AND" => [
	"user" => $username,
	"password" => $pass
	]
]);

/*var_dump($datas);*/

if(!empty($datas))
{
	session_start();
	$_SESSION['user'] = $username;
	$data=$datas[0];
	$_SESSION['name']=$data['nombre'];
	$_SESSION['foto']=$data['foto'];

	header('Location:index.php');
}
else // Login fail
{
	header('Location:loginform.php?error=1');
}
?>