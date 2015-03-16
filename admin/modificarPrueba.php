<?php
require_once('../clases/medoo.php');
if(!empty($_POST['accion']))
  {
    $database = new medoo();
    $database->update("prueba", [
    "nombre_prueba" => $_POST['name'],
    "precio" => $_POST['precio']
    ],[
    "id_prueba" => $_POST['id']
    ]);

     // REDIRECCION EN LISTA DE NOTICIAS
    header('Location: pruebas.php?modif=ok');
  } 
  else
  {
    //Checar el id 
    if(!isset($_GET['id']))
      header('Location: pruebas.php');

    // recuperation de la noticia 
    $database = new medoo();
    $datas = $database->select("prueba", "*", [
      "AND" => [
      "id_prueba" => $_GET['id']
      ]
    ]);

    if(empty($datas))
      header('Location: pruebas.php');
    else
      $data=$datas[0];
  
   }
   $block='';
   $page='';
   include ('header.php');
?>

<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-arrows-cw"></i> Cambios a Prueba <small>actualizar informacion</small></h2>
                <p class="pagedesc">Sistema para realizar cambios en una prueba</p>
                <div class="page-bar">
                    <div class="btn-toolbar"> </div>
                </div>
            </div>
            <!-- // page head -->
            
            <div id="page-content" class="page-content">
                <section>
                    <div class="row-fluid margin-top20">
                        <div class="span12 well well-black">
                            <div class="row-fluid">
                                     <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-asterisk"></i> Datos Prueba <small>modificar prueba</small></h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="accounForm" class="form-horizontal" method="POST" action="modificarPrueba.php" >
                                             <input type="hidden" name="id" value="<?php echo $data['id_prueba']; ?>">
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                        <input type="hidden" name="accion" value="Agregar">
                                                        <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                
                                                             <li class="control-group">
                                                                <label class="control-label">Nombre de prueba <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" name="name" value="<?php echo $data['nombre_prueba']; ?>">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                             <li class="control-group">
                                                                <label class="control-label">Precio <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" name="precio" value="<?php echo $data['precio']; ?>">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                 
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-blue">Validar registro</button>
                                                        <button class="btn cancel">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget -->                                     
                                </div>
                                <!-- // column -->
                            </div>
                        </div>
                        <!-- // column --> 
                    <!-- // Example row --> 
                </section>
              
                
            </div>
            <!-- // page content --> 
            
        </div>
        <!-- // main-content --> 


<?php	
include ('footer.php');
?>


