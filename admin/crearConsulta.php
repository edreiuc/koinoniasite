<?php
require_once('../clases/medoo.php');
$database = new medoo();

if(!empty($_POST['accion']))
{

    if(empty($_POST['doctor'])){
        /************ CONSULTA TABLE ***************/
        $paciente=$_POST['paciente'];
        $part=explode("-", $paciente);
        $primer=$part[0];
        $segundo=$part[1];

        $pacient=$database->select("paciente",[
        "id_paciente"]
        ,[
        "AND" => [
        "nombre" => $primer,
        "apellido" => $segundo
        ]
        ]);

        foreach ($pacient as $pac) {      
            $last_consulta = $database->insert("consulta",[
            "id_paciente" => $pac['id_paciente'],
            "fecha" => $_POST['fecha'],
            "status" => $_POST['inlineRadio']
            ]); 
        }
        /************ CONSULTA_PRUEBA TABLE ***************/
        $prba=$_POST['blah2'];
        $pruebas=explode(",",$prba);

        foreach ($pruebas as $prb) {      
            $dat = $database->insert("consulta_prueba",[
            "id_prueba" => $prb,
            "id_consulta" => $last_consulta
            ]);
        }

        $dato = $database->insert("diagnostico",[
        "id_doctor" => "1",
        "id_consulta" => $last_consulta,
        "diagnostico" => "sin diagnostico"
        ]);
       
       header('Location:consulta.php');
    }
    else{
        /************ CONSULTA TABLE ***************/
        $paciente=$_POST['paciente'];
        $part=explode("-", $paciente);
        $primer=$part[0];
        $segundo=$part[1];

        $pacient=$database->select("paciente",[
        "id_paciente"]
        ,[
        "AND" => [
        "nombre" => $primer,
        "apellido" => $segundo
        ]
        ]);

        foreach ($pacient as $pac) {      
            $last_consulta = $database->insert("consulta",[
            "id_paciente" => $pac['id_paciente'],
            "fecha" => $_POST['fecha'],
            "status" => $_POST['inlineRadio']
            ]); 
        }
      //echo $last_consulta;

       /************ DIAGNOSTICO TABLE ***************/
       $name=$_POST['doctor'];
       $partes=explode("-",$name);  //separamos toda la cadena en dos partes a partir de -
       $first=$partes[0];
       $second=$partes[1];
        //hacemos una consulta a tabla doctor para recuperar id por sus nombre y apellidos
       $doct = $database->select("doctor", [
        "id_doctor"]
        ,[  
        "AND" => [
        "nombre" => $first,
        "apellido" => $second
        ]
        ]);
       //recorremos el arreglo para insertar en tabla diagnostico segun su id recuperado
        foreach ($doct as $iddoc) {
            $dato = $database->insert("diagnostico",[
            "id_doctor" => $iddoc['id_doctor'],
            "id_consulta" => $last_consulta,
            "diagnostico" => $_POST['descripcion']
            ]);
        }

        /************ CONSULTA_PRUEBA TABLE ***************/
        $prba=$_POST['blah2'];
        $pruebas=explode(",",$prba);

        foreach ($pruebas as $prb) {      
            $dat = $database->insert("consulta_prueba",[
            "id_prueba" => $prb,
            "id_consulta" => $last_consulta
            ]);
            
        }

        header('Location:consulta.php');
    }
}
$block='actividad';
$page='crearactividad';
include ('header.php');
?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class=" fontello-icon-list-add"></i> Consulta <small>registro de actividad</small></h2>
                <p class="pagedesc">Sistema de para registro de actividades</p>
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
                                        <h4><i class="fontello-icon-list-4"></i> Datos consulta <small>nuevo consulta</small></h4>
                                    </div>
                                    <div class="widget-content">
                                        <div class="widget-body">
                                            <form id="accounForm" class="form-horizontal" method="POST" action="crearConsulta.php" >
                                                
                                                <div class="row-fluid">
                                                    <div class="span12 form-dark">
                                                        <fieldset>
                                                            <input type="hidden" name="accion" value="Agregar">
                                                            <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                    
                                                                <li class="control-group">
                                                                    <label class="control-label">Nombre del paciente <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" size="50" id="paciente" name="paciente" placeholder="Ingrese paciente" />
                                                                        <div id="suggestions-paciente"></div>

                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                
                                                                <li class="control-group">
                                                                    <label class="control-label">Doctor al mando<span></span></label>
                                                                    
                                                                    <div class="controls">
                                                                        <input type="text" size="50" id="doctor" name="doctor" placeholder="Ingrese doctor" />
                                                                        <div id="suggestions"></div>

                                                                                 <textarea id="formA06" class="input-block-level" rows="3" placeholder="describa el diagnostico" name="descripcion"></textarea>                          
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->  

                                                                <li class="control-group">
                                                                    <label class="control-label">Fecha de consulta <span>*</span></label>
                                                                    <div class="controls">
                                                                        <div id="datetimepicker1" class="input-append date">
                                                                            <input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="fecha" readonly="readonly"/>
                                                                            <span class="add-on">
                                                                              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                                              </i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Status de prueba <span>*</span></label>
                                                                    <div class="controls">
                                                                        <label class="radio inline"><input id="formA20" class="radio" type="radio" name="inlineRadio" value="enconfirmar">Por confirmar</label>
                                                                        <label class="radio inline"><input id="formA21" class="radio" type="radio" name="inlineRadio" value="confirmada">Confirmada</label>
                                                                        <label class="radio inline"><input id="formA22" class="radio" type="radio" name="inlineRadio" value="cancelada">Cancelada</label>
                                                                    </div>
                                                                </li>
                                                                 <!-- // form item -->
                                                                
                                                                <li class="control-group">
                                                                    <label class="control-label">Pruebas: <span>*</span></label>
                                                                    <div class="controls">                        
                                                                                
                                                                                <div class="iu-widget">
                                                                                    <input type="text" id="demo-input-facebook-theme" name="blah2" />                                                                                   
                                                                                </div> 

                                                                                <input type="hidden" name="pruebas" id="prueb" value="">
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


