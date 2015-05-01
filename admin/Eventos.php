<?php
$block='events';
$page='eventos';
include ('header.php');
require_once('../clases/medoo.php');
$database = new medoo();
$datas = $database->select("evento", "*",["ORDER" => "evento.evento DESC"]);
?>

 <div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-calendar-1"></i> Eventos <small>Lista de eventos</small></h2>
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
                                                <th scope="col">Titulo</th>
                                                <th scope="col" class="hidden-phone">Fecha</th>
                                                <th scope="col" class="hidden-tablet hidden-phone">Direccion</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              foreach($datas as $data)
                                                {
                                                  echo "<tr>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['evento'].'</p>';
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['fecha']."</p>";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['direccion']."</p>";
                                                       echo "</td>";

                                                       echo "<td>";
                                                       echo '<a href="modificarEvento.php?id='.$data['id_evento'].'" class="open-suprim btn btn-info"><i class="fa fa-pencil-square"></i> Modificar</a>';
                                                       echo '&nbsp; &nbsp;
                                                            <a class="open-suprim btn btn-danger btn-md" data-id="'.$data['id_evento'].'" data-titulo="'.$data['evento'].'" data-toggle="modal" data-target="#myModal">
                                                              <i class="fa fa-minus-square"></i> Borrar
                                                             </a>';
                                                       echo "</td>";
                                                  echo "</tr>";
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                <!-- // column -->
                            </div>
                        </div>
                        <!-- // column --> 
                    </div>
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
                  <h3 class="modal-title" id="myModalLabel">Borrar registro de evento</h3>
                </div>
                <div class="modal-body">
                   <p>¿ Está seguro de continuar con la operación ?</p>
                   <p class="alert alert-info" id="titulo-borrado"></p>
                </div>
                <div class="modal-footer">
                  <form method="POST" action="borrarEvento.php">
                    <input type="hidden"  name="eventoid" id="eventoid" value="">
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


