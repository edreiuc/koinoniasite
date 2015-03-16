<?php
require_once '../clases/medoo.php';
// checar los POST
if(!isset($_POST['pruebaid']))
	header('Location:pruebas.php');

$database = new medoo();	
$datas = $database->delete("prueba", [
"AND" => [
"id_prueba" => $_POST['pruebaid']
]
]);

//var_dump($datas);
header('Location:pruebas.php?delete=ok');

?>