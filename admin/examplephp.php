<?php

require_once '../clases/medoo.php';
$database = new medoo();
$datas = $database->select("prueba", ["id_prueba(id)","nombre_prueba(name)"],[
'LIKE' => [
'AND' => [
'nombre_prueba' => $_GET["q"]
]
]
]);

 
  $out= array_values($datas);
  $fp = json_encode($out);

echo $fp;


?>