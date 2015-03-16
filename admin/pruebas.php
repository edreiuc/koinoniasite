<?php
$block='prueba';
$page='listaprueba';
include ('header.php');
require_once('../clases/medoo.php');
$database = new medoo();
$datas = $database->select("prueba", "*",["ORDER" => "prueba.nombre_prueba DESC"]);

  /********GENERACION DE JSON FILE*********/
 /* $out= array_values($datas);
  $fp = fopen('pruebas.json', 'w');
  fwrite($fp, json_encode($out));
  fclose($fp);*/
?>

 <div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-chart-bar"></i> Pruebas <small>listado de pruebas</small></h2>
                <p class="pagedesc">tabla de pruebas existentes en sistema </p>
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
                                   
                                    <table class="table table-striped table-bordered boo-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre de Prueba</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Template</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              foreach($datas as $data)
                                                {
                                                  echo "<tr>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['nombre_prueba'].'</p>';
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['precio']." Pesos </p>";
                                                       echo "</td>";
                                                       echo "<td>LINK TEMPLATE</td>";
                                                       echo "<td>";
                                                       echo '<a href="modificarPrueba.php?id='.$data['id_prueba'].'" class="open-suprim btn btn-info"><i class="fa fa-pencil-square"></i> Modificar</a>';
                                                       echo '&nbsp; &nbsp;
                                                            <a class="open-suprim-prueba btn btn-danger btn-md" data-id="'.$data['id_prueba'].'" data-titulo="'.$data['nombre_prueba'].'" data-toggle="modal" data-target="#myModal">
                                                              <i class="fa fa-minus-square"></i> Borrar
                                                             </a>';
                                                       echo "</td>";
                                                  echo "</tr>";
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>


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
        
        <!--  MODAL CONFIRM DELETE -->
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="myModalLabel">Borrar registro de doctor</h3>
                </div>
                <div class="modal-body">
                   <p>¿ Está seguro de continuar con la operación ?</p>
                   <p class="alert alert-info" id="titulo-borrado"></p>
                </div>
                <div class="modal-footer">
                  <form method="POST" action="borrarPrueba.php">
                    <input type="hidden"  name="pruebaid" id="pruebaid" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="confirm">Borrar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    
<?php	
include ('footer.php');
?>


