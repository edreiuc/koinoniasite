<?php
require_once('../clases/medoo.php');
if(!empty($_POST['accion']))
  {
    $database = new medoo();
    $database->update("paciente", [
    "nombre" => $_POST['name'],
    "apellido" => $_POST['lastname'],
    "telefono" => $_POST['casa'],
    "celular" => $_POST['celular'],
    "direccion" => $_POST['direccion'],
    "correo" => $_POST['email'],
    "column" => $_POST['column']
    ],[
    "id_paciente" => $_POST['id']
    ]);

     // REDIRECCION EN LISTA DE NOTICIAS
     header('Location: pacientes.php?modif=ok');
  } 
  else
  {
    //Checar el id 
    if(!isset($_GET['id']))
      header('Location: pacientes.php');

    // recuperation de la noticia 
    $database = new medoo();
    $datas = $database->select("paciente", "*", [
      "AND" => [
      "id_paciente" => $_GET['id']
      ]
    ]);

    if(empty($datas))
      header('Location: pacientes.php');
    else
      $data=$datas[0];
  
   }
    $block='';
    $page='';
   include ('header.php');

?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-arrows-cw"></i> Paciente <small>modificar elemento</small></h2>
                <p class="pagedesc">Sistema cambios en datos de pacientes</p>
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
                                    <h4><i class="fontello-icon-asterisk"></i> Datos personales <small>modificar paciente</small></h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="accounForm" class="form-horizontal" method="POST" action="modificarPaciente.php" >
                                            
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                    <input type="hidden" name="id" value="<?php echo $data['id_paciente']; ?>">
                                                    <input type="hidden" name="accion" value="Agregar">
                                                        <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                
                                                            <li class="control-group">
                                                                <label class="control-label">Nombre <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" name="name" value="<?php echo $data['nombre']; ?>" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label class="control-label">Apellido <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" name="lastname" value="<?php echo $data['apellido']; ?>" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->                                                                 
                                                                                                                        
                                                            <li class="section-form">
                                                                <h4>Informacion contacto</h4>
                                                            </li>
                                                            <!-- // section form divider -->
                                                            
                                                            <li class="control-group">
                                                                <label class="control-label">Email <span>*</span></label>
                                                                <div class="controls">
                                                                        <input class="span6" type="email" name="email" value="<?php echo $data['correo']; ?>" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label class="control-label">Telefono de Casa <span>*</span></label>
                                                                <div class="controls controls-row">
                                                                    <input class="span6" type="text" name="casa" value="<?php echo $data['telefono']; ?>" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->

                                                            <li class="control-group">
                                                                <label class="control-label">Telefono celular <span>*</span></label>
                                                                <div class="controls controls-row">
                                                                    <input class="span6" type="text" name="celular" value="<?php echo $data['celular']; ?>" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->

                                                            <li class="control-group">
                                                                <label  class="control-label">Direccion <span>*</span></label>
                                                                <div class="controls controls-row">
                                                                    <input class="span6" type="text" value="<?php echo $data['direccion']; ?>" name="direccion" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <fieldset>
                                                        <legend class="section-form">Informacion de institucion medica</legend>
                                                        <ul class="form-list label-left list-bordered dotted">
                                                            
                                                            
                                                            <li class="control-group">
                                                                <label class="control-label">Clave de acceso <span>*</span></label>
                                                                <div class="controls">
                                                                    <input class="span6" type="text" value="<?php echo $data['column']; ?>" name="column" > 
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-blue">Actualizar registro</button>
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


