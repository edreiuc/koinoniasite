<?php
require_once('../clases/medoo.php');
$database = new medoo();



if(!empty($_POST['accion']))
{
    if($_POST['status']==1){
        echo '<script type="text/javascript">alert("Selecciona un valor a estatus");</script>';
    }
    else{
        $events = $database->insert("evento",[
        "evento" => $_POST['evento'],
        "descripcion" => $_POST['descripcion'],
        "direccion" => $_POST['direccion'],
        "status" => $_POST['status'],
        "fecha" => $_POST['fecha'],
        "embed" => $_POST['map']
        
        ]); 

      /*  echo $_POST['status'];
        var_dump($events);*/
           
        header('Location:Eventos.php');
    }

    
}
else
{
   $datas = $database->select("status", "*", ["ORDER" => "status.estado DESC"]); 
}
$block='events';
$page='creareven';
include ('header.php');
?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-calendar-1"></i>Evento <small>Registro nuevo</small></h2>
                <p class="pagedesc">registro de eventos nuevos</p>
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
                                        <h4><i class="fontello-icon-list-4"></i> Datos Evento <small>elemento nuevo</small></h4>
                                    </div>
                                    <div class="widget-content">
                                        <div class="widget-body">
                                            <form id="accounForm" class="form-horizontal" method="POST" action="crearEvento.php" >
                                                
                                                <div class="row-fluid">
                                                    <div class="span12 form-dark">
                                                        <fieldset>
                                                            <input type="hidden" name="accion" value="Agregar">
                                                            <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                    
                                                                <li class="control-group">
                                                                    <label class="control-label">Nombre del Evento <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span6" type="text" size="50" id="paciente" name="evento" placeholder="Ingrese nombre del evento" required/>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                
                                                                <li class="control-group">
                                                                    <label class="control-label">Detalles de evento<span>*</span></label>
                                                                    
                                                                    <div class="controls">
                                                                        <div id="suggestions"></div>

                                                                                 <textarea id="formA06" class="input-block-level" rows="3" placeholder="Ingrese una descripcion del evento" name="descripcion" required></textarea>                          
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Direccion <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span6" type="text" size="100" name="direccion" placeholder="Ingrese la direccion" required />
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Embed map <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span12" type="text" name="map" placeholder="Ingrese el codigo src del embed google maps" required />
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->   
                                                                

                                                                <li class="control-group">
                                                                    <label class="control-label">Fecha<span>*</span></label>
                                                                    <div class="controls">
                                                                        <div id="datetimepicker1" class="input-append date">
                                                                            <input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="fecha" readonly="readonly" required/>
                                                                            <span class="add-on">
                                                                              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                                              </i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Status<span>*</span></label>
                                                                    <div class="controls">
                                                                        <select id="myselect" class="span3" name="status">
                                                                            <?php
                                                                                foreach ($datas as $data)
                                                                                {
                                                                                    echo '<option value="'.$data['id_status'].'">'.$data['estado'].'</option>';
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </li>
                                                                 <!-- // form item -->                                                  
                                                            </ul>
                                                        </fieldset>
                                                        <!-- // fieldset Input -->

                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-blue" id="idSubmit">Validar registro</button>
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
