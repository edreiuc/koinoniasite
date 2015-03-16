<?php
require_once('../clases/medoo.php');
$database = new medoo();
if(!empty($_POST['accion']))
{
    $database = new medoo();
    $datas = $database->insert("prueba",[
    "nombre_prueba" => $_POST['name'],
    "precio" => $_POST['precio']
    ]);

    //var_dump($database);
    header('Location:pruebas.php');
}
$block='prueba';
$page='crearprueba';
include ('header.php');
?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-list-add"></i> Nueva Prueba <small>registro de pruebas</small></h2>
                <p class="pagedesc">Sistema para ingresar nuevas pruebas</p>
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
                                    <h4><i class="fontello-icon-thermometer"></i> Datos Prueba <small>nueva prueba</small></h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="accounForm" class="form-horizontal" method="POST" action="crearPrueba.php" >
                                            
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                        <input type="hidden" name="accion" value="Agregar">
                                                        <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                
                                                             <li class="control-group">
                                                                <label class="control-label">Nombre de prueba <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" name="name" value="" required>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                             <li class="control-group">
                                                                <label class="control-label">Precio <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" name="precio" value="" required>
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


