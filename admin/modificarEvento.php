<?php
require_once('../clases/medoo.php');
if(!empty($_POST['accion']))
  {
    $database = new medoo();
    $database->update("evento", [
    "evento" => $_POST['evento'],
    "descripcion" => $_POST['descripcion'],
    "direccion" => $_POST['direccion'],
    "status" => $_POST['status'],
    "fecha" => $_POST['fecha']
    ],[
    "id_evento" => $_POST['id']
    ]);

     // REDIRECCION EN LISTA DE NOTICIAS
    header('Location: Eventos.php?modif=ok');
  } 
  else
  {
    //Checar el id 
    if(!isset($_GET['id']))
      header('Location: Eventos.php');

    // recuperation de la noticia 
    $database = new medoo();
    $datas = $database->select("evento", "*", [
      "AND" => [
      "id_evento" => $_GET['id']
      ]
    ]);

    if(empty($datas))
      header('Location: Eventos.php');
    else
      $data=$datas[0];
      $edos = $database->select("status", "*", ["ORDER" => "status.estado DESC"]); 
  
   }
   $block='';
   $page='';
   include ('header.php');

?>


<div id="main-content" class="main-content container-fluid">
             <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-calendar-1"></i> Evento <small>Editar registro</small></h2>
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
                                        <h4><i class="fontello-icon-list-4"></i> Datos Evento <small>actualizar elemento</small></h4>
                                    </div>
                                    <div class="widget-content">
                                        <div class="widget-body">
                                            <form id="accounForm" class="form-horizontal" method="POST" action="modificarEvento.php" >
                                                
                                                <div class="row-fluid">
                                                    <div class="span12 form-dark">
                                                        <fieldset>
                                                            <input type="hidden" name="accion" value="Editar">
                                                            <input type="hidden" name="id" value="<?php echo $data['id_evento']; ?>">
                                                            <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                    
                                                                <li class="control-group">
                                                                    <label class="control-label">Nombre del Evento <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span6" type="text" size="50" id="paciente" name="evento" value="<?php echo $data['evento']; ?>" />
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                
                                                                <li class="control-group">
                                                                    <label class="control-label">Detalles de evento<span>*</span></label>
                                                                    
                                                                    <div class="controls">
                                                                        <div id="suggestions"></div>

                                                                                 <textarea id="formA06" class="input-block-level" rows="3" name="descripcion"><?php echo $data['descripcion']; ?></textarea>                          
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Direccion <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span6" type="text" size="50" name="direccion" value="<?php echo $data['direccion']; ?>" />
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->  

                                                                <li class="control-group">
                                                                    <label class="control-label">Fecha<span>*</span></label>
                                                                    <div class="controls">
                                                                        <div id="datetimepicker1" class="input-append date">
                                                                            <input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="fecha" readonly="readonly" value="<?php echo $data['fecha']; ?>" />
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
                                                                        <?php  $stado = $database->select("status", "*", [
                                                                                "AND" => [
                                                                                "id_status" => $data['status']
                                                                                ]
                                                                                ]); 
                                                                                $std=$stado[0];?>
                                                                            <option value="<?php echo $data['status']; ?>"><?php echo $std['estado']; ?></option>
                                                                            <?php
                                                                                foreach ($edos as $edo)
                                                                                {
                                                                                    echo '<option value="'.$edo['id_status'].'">'.$edo['estado'].'</option>';
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


