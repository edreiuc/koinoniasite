<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
$searching = $_POST['paciente'];
require_once '../clases/medoo.php';
$database = new medoo();
/*$datas = $database->select("doctor", "*",["ORDER" => "doctor.nombre DESC"]);
var_dump($datas);*/

$paciente = $database->select("paciente", ['id_paciente', "nombre", "apellido"], [
'LIKE' => [
'OR' => [
'nombre' => $searching,
'apellido' => $searching
]

]
]);
if(!isset($paciente)){
	echo 'ninguna coincidencia';
}
else{
	foreach ($paciente as $pac) {
		 echo '<div class="suggest-element"><a class="suggest-element-items" data-names="'.$pac['nombre'].'-'.$pac['apellido'].'"  id="suggest-'.$pac['id_paciente'].'">'.utf8_encode($pac['nombre']).' '.$pac['apellido'].'</a></div>';
	}
	
}

?>