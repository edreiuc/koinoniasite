<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
$search = $_POST['doctor'];
require_once '../clases/medoo.php';
$database = new medoo();
/*$datas = $database->select("doctor", "*",["ORDER" => "doctor.nombre DESC"]);
var_dump($datas);*/

$doctor = $database->select("doctor", ['id_doctor', "nombre", "apellido"], [
'LIKE' => [
'OR' => [
'nombre' => $search,
'apellido' => $search
]

]
]);
if(!isset($doctor)){
	echo 'ninguna coincidencia';
}
else{
	foreach ($doctor as $doc) {
		 echo '<div class="suggest-element"><a class="suggest-element-item" data-nombre="'.$doc['nombre'].'-'.$doc['apellido'].'"  id="suggest-'.$doc['id_doctor'].'">'.utf8_encode($doc['nombre']).' '.$doc['apellido'].'</a></div>';
	}
	
}

?>