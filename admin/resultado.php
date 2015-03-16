<?php
require_once('../clases/medoo.php');
$database = new medoo();

/********************************* GENERAR VISUALIZACION DE FORMULARIO ******************************************/
if(isset($_POST['visualizar'])){
    $vistas = $database->select("vistaconsulta", "*",["id_consulta_prueba" => $_POST['id']]);
    $vista=$vistas[0];
    
    $type="close";


    if ($_POST['tipo']==2) {
     /*   $viewRes = $database->select("vistaresultado", "*",[ "AND" => ["id_prueba"=> $_GET['prueba']]]);
        $Resul=$viewRes[0];
       // var_dump($viewRes);*/
        $idprueba=$vista['id_prueba'];
        $views = $database->select("vistaresultado", "*",[ "AND" => ["id_prueba"=> $idprueba], "ORDER" => "vistaresultado.position ASCE"]);
        $view=$views[0];
        $blockform='close';
    }
    elseif($_POST['tipo']==1)
    {
        $blockform="false"; //echo '<script type="text/javascript">alert(" Porfavor seleccione una opcion de visualizacion");</script>'; 
    }
    else{  $blockform="false"; /*echo '<script type="text/javascript">alert(" Porfavor seleccione una opcion de visualizacion");</script>'; */ }
    
}

/*********************************** GUARDAR INFO DE FORMULARIO ****************************************/
elseif(!empty($_POST['guardar'])) {

    $value = $_POST['values'];
    $idFielValue = $_POST['idfielvalue'];
    for ($i = 0; $i < count($value); $i++) {
        $formfieldvalue = $database->insert("form_field_value",[
        "id_consulta_prueba" => $_POST['consultaprueba'],
        "value" => $value[$i],
        "id_form_field" => $idFielValue[$i]
        ]);
        
    }
    header('Location: consulta.php');
   
}

/********************************** CONTRUCCION DE FORMULARIO DESPUES DE SU CREACION *********************************/
 elseif(isset($_GET['datas'])) 
{
    $vistas = $database->select("vistaconsulta", "*",["id_consulta_prueba" => $_GET['id']]);
    if(empty($vistas))
          header('Location: consulta.php');
    else
          $vista=$vistas[0];

    $views = $database->select("vistaresultado", "*",["id_form" => $_GET['id_form']]);
    if(empty($views))
          $blockform='false';
    else
          $view=$views[0];
          $blockform='open';
          $type="non";


}

/********************* CREACION DE UN FORMULARIO NUEVO *******************************/
elseif(!empty($_POST['registro']))
{
    $form = $database->insert("form",[
            "name_template" => $_POST['tituloTemplate'],
            "id_prueba" => $_POST['prueba']
            ]);


    $name = $_POST['nameInput'];
    $unidad = $_POST['unidad'];
    $posicion = $_POST['orden'];
   
    for ($i = 0; $i < count($name); $i++) {
        $form_field = $database->insert("form_field",[
        "id_form" => $form,
        "name" => $name[$i],
        "position" => $posicion[$i],
        "unidad" => $unidad[$i]
        ]);
        
    }
    var_dump($form_field);
    $resultado = $database->insert("resultado",[
            "id_consulta_prueba" => $_POST['id'],
            "tipo" => "algo",
            "url_fichero" => "algo",
            "id_form" => $form
            ]);
    
    header('Location: resultado.php?id='.$_POST[id].'&datas=1&id_form='.$form);
}
else
{

    $vistas = $database->select("vistaconsulta", "*",["id_consulta_prueba" => $_GET['id']]);

    if(empty($vistas))
    {header('Location: consulta.php');}

    else{
        $vista=$vistas[0];
        $idprueba=$vista['id_prueba'];
        $idconsultaprueba=$vista['id_consulta_prueba'];
        $views = $database->select("vistaresultado", "*",[ "AND" => ["id_prueba"=> $idprueba]]);
        
        if(empty($views))
        {
        //PARA UN FORMULARIO NO CREADO
              $blockform='false';
              $type="false";
        }
        elseif(!empty($views)){//FORMULARIO CREADO PERO VACIO
            $view=$views[0];
            $idformfield=$view['id_form_field'];
            $values = $database->select("form_field_value", "*", [ "AND" => ["id_consulta_prueba" => $idconsultaprueba, "id_form_field" => $idformfield]]);
            if(!empty($values))//ACTIVA BLOQUE DE VISUALIZACION
            {
               
                $blockform='false';
                $type="true";
            }
            elseif(empty($values))//ACTIVA BLOQUE PARA LLENAR DATOS EN CASO DE ESTAR VACIO
            {
                
                $blockform='open';
                $type="non";
            }  
          }
        else{$type="true";}
    }
}
$block='resultados';
$page='crearResultado';
include ('header.php');
?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-list-alt"></i> Resultados <small>modulo de estadistica</small></h2>
                <p class="pagedesc">Sistema de resultados para analisis medicos</p>
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
                                            <h4><i class="fontello-icon-list-alt"></i> Datos prueba <small>resultado total</small></h4>
                                        </div>
                                        <div class="widget-content">
                                            <div class="widget-body">                                                
                                                    <div class="row-fluid">
                                                        <div class="span6 form-dark">
                                                            <fieldset>
                                                                <ul class="form-list label-left list-bordered dotted">
                                                                    
                                                                    <li class="control-group">
                                                                        <h3 class="wells well-nice well-small inline">
                                                                            <i class="fontello-icon-lodging"></i>
                                                                            Paciente: 
                                                                            <strong><?php echo $vista['nombre_paciente'].' '.$vista['apellido_paciente']; ?></strong>
                                                                        </h3>
                                                                         <h3 class="wells well-nice well-small inline">
                                                                           <i class="fontello-icon-user-md"></i>
                                                                            Doctor titular: 
                                                                            <strong><?php echo $vista['nombre_doctor'].' '.$vista['apellido_doctor']; ?></strong>
                                                                        </h3>
                                                                    </li>
                                                                    <!-- // form item -->
                                                                    
                                                                     <li class="control-group">
                                                                        <div class="span12 well well-nice bg-gray-light">
                                                                            <h4 class="simple-header">Diagnostico</h4>
                                                                            <p>
                                                                                <?php echo $vista['diagnostico']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </li>                   
                                                                </ul>
                                                            </fieldset>
                                                            <!-- // fieldset Input -->
                                                        </div>


                                                        <div class="span6 form-dark">
                                                            <fieldset>
                                                                <ul class="form-list label-left list-bordered dotted">
                                                                    
                                                                    <li class="control-group">
                                                                        <h4>Lista de pruebas asignadas</h4>
                                                                        <ul class="simple">
                                                                            <?php
                                                                                $pruebas = $database->select("vistaconsulta", "*",["id_consulta" => $vista['id_consulta'] ]);
                                                                                foreach ($pruebas as $consul) {
                                                                                    echo '<li>  <i class="fontello-icon-edit-2"></i> <a href="resultado.php?id='.$consul['id_consulta_prueba'].'">'.$consul['nombre_prueba'].'</a></li>';                                                           
                                                                                }
                                                                            ?>
                                                                           
                                                                        </ul>
                                                                    </li>
                                                                    <!-- // form item -->
                                                                                        
                                                                </ul>
                                                            </fieldset>
                                                            <!-- // fieldset Input -->
                                                        </div>

                                                       <!--  aqui verificamos si existe un registro, en caso de no haber se activa este formulario imprimiendo en html -->
                                                       <?php        

                                                            //BLOCK PARA LA SELECCION DE TIPO DE VISUALIZACION DEL FORMULARIO REGISTRADO

                                                            if( $type=="true" /*isset($_GET['check'])*/)
                                                            {
                                                                echo '<div class="span12 form-dark">
                                                                    <fieldset>
                                                                        <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                     
                                                                            <li class="control-group">
                                                                                <label for="accountFirstName" class="control-label">Visualizar Resultados</label>
                                                                                <form method="POST" action="resultado.php">
                                                                                    <input type="hidden" name="id" value="'.$_GET['id'].'"/>
                                                                                    <input type="hidden" name="prueba" value="'.$vista['id_prueba'].'"/>
                                                                                    <input type="hidden" name="visualizar" value="ver"/>
                                                                                    <div class="controls">
                                                                                       <select style="width:325px" name="tipo" id="tipo">
                                                                                           <option value="0">Seleccione un tipo de resultado a mostrar</option>
                                                                                           <option value="1">Archivo</option>
                                                                                           <option value="2">Formulario html</option>
                                                                                       </select>
                                                                                    </div>
                                                                                    <button class="btn btn-blue" type="submit">Generar vista</button>
                                                                                </form>
                                                                            </li>
                                                                            <!-- // form item -->
                                                                            
                                                                            <li class="control-group">
                                                                                
                                                                                
                                                                                <div class="controls">
                                                                                    <input type="hidden" name="fichero">                          
                                                                                </div>
                                                                            </li>
                                                                            <!-- // form item -->                        
                                                                        </ul>
                                                                    </fieldset>
                                                                    <!-- // fieldset Input -->
                                                                </div>';
                                                            }

                                                            //BLOCK DE INSERCCION DE ELEMENTOS PARA LA CREACION DE UN FORMULARIO
                                                             if($type=="false"){

                                                                echo '<div class="span12 form-dark">
                                                                    <h4><i class="fontello-icon-list-alt"></i> Resultado Analisis <small>'.$vista['nombre_prueba'].'</small></h4>
                                                                    <div class="span10 well well-nice textcenter">

                                                                        <fieldset>
                                                                            <a class="btn btn-mini btn-black" id="inputs">
                                                                            <i class="fontello-icon-plus-circle-2"></i>
                                                                            Agregar campos
                                                                            </a>                                                       

                                                                           <form action="resultado.php" method="POST">
                                                                                <input type="hidden" name="id" value="'.$_GET['id'].'"/>
                                                                                <input type="hidden" name="prueba" value="'.$vista['id_prueba'].'"/>
                                                                                <input type="hidden" name="registro" value="nuevo"/><br>
                                                                                    <div class="span12"><input style="display:block; margin:auto;" class="span6" type="text" name="tituloTemplate" placeholder="Titulo de plantilla" required/></div>
                                                                                    <div class="row-fluid">                                                                        
                                                                                        <div class="span4"><h4>nombre campo</h4></div>
                                                                                        <div class="span4"><h4>Unidad</h4></div>
                                                                                        <div class="span4"><h4>Orden</h4></div>
                                                                                        <div class="row-fluid">
                                                                                            <div class="span12" id="posicion"></div>                                                                      
                                                                                        </div>
                                                                                    </div>
                                                                                <button type="submit" class="btn btn-blue">Validar registro</button>
                                                                           </form>
                                                                        </fieldset>
                                                                    <!-- // fieldset Input -->
                                                                    </div>                                                            
                                                                </div>';

                                                             }


                                                                if ($blockform=='open') 
                                                                {
                                                                   // BLOCK DE FORMULARIO CREADO A LLENAR
                                                                    echo '<div class="span12 form-dark">
                                                                        <h4><i class="fontello-icon-list-alt"></i> Resultado Analisis <small>'.$vista['nombre_prueba'].'</small></h4>
                                                                        <div class="span10 well well-nice">

                                                                            <fieldset>                                                                                                                
                                                                               <form action="resultado.php" method="POST">
                                                                                    <input type="hidden" name="guardar" value="nuevo"/>
                                                                                    <input type="hidden" name="consultaprueba" value="'.$view['id_consulta_prueba'].'"/>
                                                                                        <div class="row-fluid">
                                                                                        <div class="span12 textcenter">
                                                                                            <h3>INGRESE VALORES AL RESULTADO</h3>
                                                                                        </div>
                                                                                        </div>
                                                                                        <div class="row-fluid"> 
                                                                                            <div class="span12 textcenter">
                                                                                                <table class="table table-bordered table-condensed bg-gray-dark">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                <th scope="col">Tipo de elemento</th>
                                                                                                <th scope="col">Valor</th>
                                                                                                <th scope="col">Unidad de medida</th>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody>';
                                                                                                foreach ($views  as $formu) 
                                                                                                {
                                                                                                    echo '  <tr>
                                                                                                                <td><label for="accountName" class="control-label">'.$formu['name'].' <span class="required">*</span></label></td>
                                                                                                                <input type="hidden" name="idfielvalue[]" value="'.$formu['id_form_field'].'"/>
                                                                                                                <td>
                                                                                                                    <input id="accountName" class="span12" type="text" name="values[]" required/></td>
                                                                                                                <td><span class="add-on">'.$formu['unidad'].'</span></td>
                                                                                                               
                                                                                                            </tr>';
                                                                                                }                              
                                                                                                    
                                                                                               echo '</tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    <button type="submit" class="btn btn-blue">Validar registro</button>
                                                                               </form>
                                                                            </fieldset>
                                                                        <!-- // fieldset Input -->
                                                                        </div>                                                            
                                                                    </div>';
                                                                 }
                                                                 //BLOCK DE FORMULARIO LLENO EN FORMATO HTML
                                                                 if ($blockform=='close') {
                                                                     echo '<div class="span12 form-dark">
                                                                        <h4><i class="fontello-icon-list-alt"></i> Resultado Analisis <small>'.$vista['nombre_prueba'].'</small></h4>
                                                                        <div id="TableResult" class="span10 well well-nice">

                                                                            <fieldset> 
                                                                                    <div class="row-fluid">
                                                                                        <div class="span12 textcenter">
                                                                                            <h3>'.$view['name_template'].'</h3>
                                                                                        </div>
                                                                                        <div class="span12">
                                                                                            <h4>Paciente: <small>'.$vista['nombre_paciente'].' '.$vista['apellido_paciente'].'</small></h4>
                                                                                            <h4>Doctor: <small>'.$vista['nombre_doctor'].' '.$vista['apellido_doctor'].'</small></h4>
                                                                                                                                                    
                                                                                            <hr>
                                                                                            <h4>Diagnostico: <small>'.$vista['diagnostico'].'</small></h4>
                                                                                            <br>
                                                                                            <label>Tabla de resultados de analisis:</label>                       
                                                                                        </div>
                                                                                    </div>
                                                                                        <div class="row-fluid"> 
                                                                                            <div class="span12 centerTable">
                                                                                                <table id="resultados" class="tab table-bordered table-condensed bg-gray-dark">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                <th scope="col">Parametro</th>
                                                                                                <th scope="col">Valor</th>
                                                                                                <th scope="col">Unidad</th>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody>';
                                                                                                foreach ($views  as $formu)
                                                                                                {
                                                                                                    echo'   <tr>
                                                                                                                <td class="right">
                                                                                                                    <label class="intitle">'.$formu['name'].': </label>
                                                                                                                </td>';
                                                                                                                $values = $database->select("form_field_value", "*",["AND" => ["id_consulta_prueba" => $formu['id_consulta_prueba'], "id_form_field" => $formu['id_form_field'] ]]);
                                                                                                                foreach ($values as $val) {
                                                                                                                    echo'<td class="centerTable">
                                                                                                                        <label class="control-label">'.$val['value'].'</label>
                                                                                                                    </td>';
                                                                                                                }
                                                                                                                
                                                                                                    echo'       <td class="left"><label class="intitle">'.$formu['unidad'].'</label></td>
                                                                                                               
                                                                                                            </tr>';
                                                                                                }                              
                                                                                                    
                                                                                               echo '</tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div id="PDFrender" class="span12">
                                                                                            </div>
                                                                                        </div>
                                                                                    
                                                                                    <form id="send"  style="float: left;">
                                                                                        <input type="hidden" name="mailDoc" value="'.$vista['correo_doctor'].'"/>
                                                                                        <input type="hidden" name="mailPac" value="'.$vista['correo_paciente'].'"/>
                                                                                        <input type="hidden" name="nombreDoc" value="'.$vista['nombre_doctor'].'"/>
                                                                                        <input type="hidden" name="nombrePac" value="'.$vista['nombre_paciente'].'"/>
                                                                                        <input type="hidden" name="analisis" value="'.$view['name_template'].'"/>
                                                                                        <input type="hidden" name="link" value="http://laboratorios/resultadosanalisis.php?idconsultaprueba='.$formu['id_consulta_prueba'].'"/>
                                                                                        <button type="submit" class="btn btn-green"><i class="fontello-icon-ok-circle-2"></i> Publicar Resultados</button>
                                                                                    </form>
                                                                                    <form method="POST" action="../createPDF.php" target="_blank">
                                                                                        <input type="hidden" name="idConsultaPrueb" value="'.$view['id_consulta_prueba'].'"/>
                                                                                        <button type="submit" class="btn btn-info"><i class="fontello-icon-ok-circle-2"></i> Ver PDF</button>
                                                                                    </form>
                                                                            </fieldset>
                                                                        <!-- // fieldset Input -->
                                                                        </div>                                                            
                                                                    </div>';                                                                    
                                                                    
                                                                 }
                                                                
                                                        ?>
                                                        
                                                        
                                                        
                                                    </div> <!-- ROW -->

                                            </div> <!-- WIDGET BODY -->
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                    </div>                       
                    <!-- // Example row --> 
                </section>
              
                
            </div>
            <!-- // page content --> 
            
</div>
<!-- // main-content --> 


<?php	
include ('footer.php');
?>


