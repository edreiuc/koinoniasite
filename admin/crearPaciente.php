<?php
    require_once('../clases/medoo.php');
     if(!empty($_POST['accion']))
    {
        $database = new medoo();
        $datas = $database->insert("paciente", [
        "nombre" => $_POST['name'],
        "apellido" => $_POST['lastname'],
        "telefono" => $_POST['casa'],
        "celular" => $_POST['celular'],
        "direccion" => $_POST['direccion'],
        "correo" => $_POST['email'],
        "column" => $_POST['column']
        ]);

        //var_dump($database);
        header('Location:pacientes.php?new=2');
    }
$block='paciente';
$page='crearpaciente';
include ('header.php');
?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-lodging"></i> Paciente <small>nuevo elemento</small></h2>
                <p class="pagedesc">Sistema de para registro de nuevos pacientes</p>
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
                                        <h4><i class="fontello-icon-user"></i> Datos personales <small>nuevo paciente</small></h4>
                                    </div>
                                    <div class="widget-content">
                                        <div class="widget-body">
                                            <form id="accounForm" class="form-horizontal" method="POST" action="crearPaciente.php" >
                                                
                                                <div class="row-fluid">
                                                    <div class="span12 form-dark">
                                                        <fieldset>
                                                        <input type="hidden" name="accion" value="Agregar">
                                                            <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                    
                                                                <li class="control-group">
                                                                    <label class="control-label">Nombre <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input id="accountFirstName" class="span6" type="text" name="name" value="" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                
                                                                <li class="control-group">
                                                                    <label for="accountLastName" class="control-label">Apellido <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input id="accountLastName" class="span6" type="text" name="lastname" value="" required>
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
                                                                            <input class="span6" type="email" name="email" value="" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                
                                                                <li class="control-group">
                                                                    <label class="control-label">Telefono de Casa <span>*</span></label>
                                                                    <div class="controls controls-row">
                                                                        <input class="span6" type="text" name="casa" value="" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Telefono celular <span>*</span></label>
                                                                    <div class="controls controls-row">
                                                                        <input class="span6" type="text" name="celular" value="" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label for="accountAddressStreet" class="control-label">Direccion <span>*</span></label>
                                                                    <div class="controls controls-row">
                                                                        <input id="accountAddressStreet" class="span6" type="text" value="" name="direccion" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">column <span>*</span></label>
                                                                    <div class="controls controls-row">
                                                                        <input class="span6" type="text" value="" name="column" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                
                                                                
                                                            </ul>
                                                        </fieldset>
                                                       
                                                        <!-- // fieldset Input -->
                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-blue">Validar registro</button>
                                                            
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


