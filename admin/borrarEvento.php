<?php
require_once '../clases/medoo.php';
// checar los POST
if(!isset($_POST['eventoid']))
	header('Location:Eventos.php');

$database = new medoo();	
$datas = $database->delete("evento", [
"AND" => [
"id_evento" => $_POST['eventoid']
]
]);

//var_dump($datas);
header('Location:Eventos.php?delete=ok');

?>