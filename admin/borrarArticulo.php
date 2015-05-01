<?php
require_once '../clases/medoo.php';
// checar los POST
if(!isset($_POST['articuloid']))
	header('Location:articulos.php');

$database = new medoo();
$articulos = $database->select("articulo", "*",["id_articulo" => $_POST['articuloid']]);
$articulo=$articulos[0];
/*unlink("../img_art/'.$articulo['thumb'].'");*/
unlink(dirname(__DIR__) . "../img_art/" . $articulo['thumb']);
$datas = $database->delete("articulo", [
"AND" => [
"id_articulo" => $_POST['articuloid']
]
]);

//var_dump($datas);
header('Location:articulos.php?delete=ok');

?>