<?php
	ini_set('display_errors', 'Off');
	require_once('../clases/medoo.php');
	 
	//Upload File
	if (isset($_POST['accion'])) 
	{
	    if (is_uploaded_file($_FILES['file']['tmp_name'])) 
	    {

	        move_uploaded_file($_FILES["file"]["tmp_name"],
	            "../clases/filescsv/" . $_FILES["file"]["name"]);

	        	$handle = fopen( "../clases/filescsv/" . $_FILES["file"]["name"], "r");
		 
			 	while(! feof($handle))
			 	{
					$data=fgetcsv($handle);

//echo $sql;
				    
					if(is_null($data[7]))
				    {echo 'error en variable clave_acceso ';}
					else
					{
						$database = new medoo();
				        $datas = $database->insert("paciente", [
				        "id_paciente" => $data[0],
				        "nombre" => $data[1],
				        "apellido" => $data[2],
				        "telefono" => $data[3],
				        "celular" => $data[4],
				        "direccion" => $data[5],
				        "correo" => $data[6],
				        "clave_acceso" => $data[7]
				        ]);

					

					   	var_dump($database->error());
						echo "<br>";

					}

					
					
				}

			    fclose($handle);
			    print "Import exitoso";
	    }
	 
	    //Import uploaded file to Database
	    
	 
	    //view upload form
	}

?>
