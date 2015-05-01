<?php
$block='Art';
$page='ListArt';
require_once('../clases/medoo.php');
$database = new medoo();
$datas = $database->select("articulo", "*",["ORDER" => "articulo.titulo DESC"]);
include ('header.php');


?>

 <div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-th-list-3"></i> Articulos <small>Control de publicaciones</small></h2>
                <p class="pagedesc">Listado de articulos</p>
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
                                                <th scope="col">Fecha</th>
                                                <th scope="col" class="hidden-tablet hidden-phone">imagen</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              foreach($datas as $data)
                                                {
                                                  echo "<tr>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['titulo']."</p>";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo '<p>'.$data['fecha']."</p>";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo '<img class="thumbnail" width="96" height="96" src="../img_art/'.$data['thumb'].'">';
                                                       echo "</td>";

                                                       echo "<td>";
                                                       echo '<a href="modificarArticulo.php?idA='.$data['id_articulo'].'" class="open-suprim btn btn-info"><i class="fa fa-pencil-square"></i> Modificar</a>';
                                                       echo '&nbsp; &nbsp;
                                                            <a class="open-suprim-articulo btn btn-danger btn-md" data-id="'.$data['id_articulo'].'" data-titulo="'.$data['titulo'].'" data-toggle="modal" data-target="#myModal">
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
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">cerrar</span></button>
                  <h3 class="modal-title" id="myModalLabel">Borrar registro del articulo</h3>
                </div>
                <div class="modal-body">
                   <p>¿ Está seguro de continuar con la operación ?</p>
                   <p class="alert alert-info" id="titulo-borrado"></p>
                </div>
                <div class="modal-footer">
                  <form method="POST" action="borrarArticulo.php">
                    <input type="hidden"  name="articuloid" id="articuloid" value="">
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


