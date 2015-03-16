<?php
$block='actividad';
$page='actividades';
include ('header.php');
require_once('../clases/medoo.php');
$database = new medoo();
/*$consultas = $database->select("consulta", "*",["ORDER" => "consulta.fecha DESC"]);
$diagnosticos = $database->select("diagnostico", "*");
$consultas_prueba = $database->select("consulta_prueba", "*");*/
// $vista = $database->select ("vistaconsulta", "*",["AND"=>["ORDER" => "vistaconsulta.fecha DESC", "GROUP" => "vistaconsulta.id_consulta"]]);
 
$vista = $database->query("SELECT * FROM vistaconsulta GROUP BY id_consulta")->fetchAll();

?>

 <div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-list-alt"></i> Consultas <small>Registro</small></h2>
                <p class="pagedesc">Listado de consultas activas e inactivas</p>
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
                                                <th scope="col">ID</th>
                                                <th scope="col" style="width: 200px">Prueba</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Paciente</th>
                                                <th scope="col">Diagnostico</th>                                          
                                                <th scope="col">Doctor </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              foreach($vista as $data)
                                                {
                                                  echo "<tr>";
                                                        echo "<td>";                                                        
                                                        echo '<p>'.$data['id_consulta'].'</p>';
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo '<ul class="simple">';
                                                        $consultas = $database->select("vistaconsulta", "*",["id_consulta" => $data['id_consulta'] ]);
                                                        foreach ($consultas as $consul) {
                                                            echo '<li>  <i class="fontello-icon-edit-2"></i> <a href="resultado.php?id='.$consul['id_consulta_prueba'].'">'.$consul['nombre_prueba'].'</a></li>';                                                           
                                                        }
                                                        echo "</ul>";                            
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo '<p>'.$data['status']."</p>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo '<p>'.$data['fecha']."</p>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo '<p>'.$data['nombre_paciente'].'  '.$data['apellido_paciente']."</p>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo '<p>'.$data['diagnostico']."</p>";
                                                        echo "</td>";

                                                        echo "<td>";
                                                        echo '<p>'.$data['nombre_doctor'].'   '.$data['apellido_doctor']."</p>";
                                                        echo "</td>";

                                                       echo "<td>";
                                                       echo '<a href="modificarConsulta.php?id='.$data['id_consulta'].'" class="open-suprim btn btn-info"><i class="fa fa-pencil-square"></i> Modificar</a>';
                                                       echo '&nbsp; &nbsp;
                                                            <a class="open-suprim-consulta btn btn-danger btn-md" data-paciente="'.$data['nombre_paciente'].' '.$data['apellido_paciente'].'" data-id="'.$data['id_consulta'].'" data-titulo="'.$data['fecha'].'" data-toggle="modal" data-target="#myModal">
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
                  <h3 class="modal-title" id="myModalLabel">Borrar registro consulta</h3>
                </div>
                <div class="modal-body">
                   <p>¿ Está seguro de continuar con la operación ?</p>
                   <p class="alert alert-info" id="titulo-borrado"></p>
                   <p class="alert alert-danger" id="paciente-actual"></p>
                </div>
                <div class="modal-footer">
                  <form method="POST" action="borrarConsulta.php">
                    <input type="hidden"  name="consultaid" id="consultaid" value="">
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


