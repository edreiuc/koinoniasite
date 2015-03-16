<?php
require_once '../clases/medoo.php';
// checar los POST
if(!isset($_POST['consultaid']))
	header('Location:consulta.php');

$database = new medoo();

$datas = $database->delete("diagnostico", [
"AND" => [
"id_consulta" => $_POST['consultaid']
]
]);

$dato = $database->delete("consulta_prueba", [
"AND" => [
"id_consulta" => $_POST['consultaid']
]
]);

$data = $database->delete("consulta", [
"AND" => [
"id_consulta" => $_POST['consultaid']
]
]);

//var_dump($datas);
header('Location:consulta.php?delete=ok');

?>