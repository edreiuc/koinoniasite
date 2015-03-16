<?php
require_once '../clases/medoo.php';
// checar los POST
if(!isset($_POST['pacienteid']))
	header('Location:pacientes.php');

$database = new medoo();	
$datas = $database->delete("paciente", [
"AND" => [
"id_paciente" => $_POST['pacienteid']
]
]);

//var_dump($datas);
header('Location:pacientes.php?delete=ok');

?>