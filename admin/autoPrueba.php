<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
$searching = $_POST['prueba'];
require_once '../clases/medoo.php';
$database = new medoo();
/*$datas = $database->select("doctor", "*",["ORDER" => "doctor.nombre DESC"]);
var_dump($datas);*/

$prueba = $database->select("prueba", ['id_prueba', "nombre_prueba"], [
'LIKE' => [
'AND' => [
'nombre_prueba' => $searching
]

]
]);
if(!isset($prueba)){
	echo 'ninguna coincidencia';
}
else{
	foreach ($prueba as $prue) {
		 echo '<div class="suggest-element"><a class="suggest-elements-items" data-pruebas="'.$prue['nombre_prueba'].'"  id="suggest-'.$prue['id_prueba'].'">'.utf8_encode($prue['nombre_prueba']).'</a></div>';
	}
	
}

?>