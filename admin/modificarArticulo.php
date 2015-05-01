<?php
    require_once('../clases/medoo.php');
    $database = new medoo();

   if (!empty($_POST['accion'])) {

    if(!empty($_FILES["file"]["name"]))
    {
          $allowedExts = array("gif", "jpeg", "jpg", "png");
          $temp = explode(".", $_FILES["file"]["name"]);
          $extension = end($temp);

          if ((($_FILES["file"]["type"] == "image/gif")
          || ($_FILES["file"]["type"] == "image/jpeg")
          || ($_FILES["file"]["type"] == "image/jpg")
          || ($_FILES["file"]["type"] == "image/pjpeg")
          || ($_FILES["file"]["type"] == "image/x-png")
          || ($_FILES["file"]["type"] == "image/png"))
          && ($_FILES["file"]["size"] < 15000000)
          && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) 
            {
              echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } 
            else 
            {
                  $random= rand(0,100);
                  $filename= $random."-".$_FILES["file"]["name"];
                  move_uploaded_file($_FILES["file"]["tmp_name"],
                  "../img_art/". $filename);
              }
          } else 
            {
              echo "Invalid file";
            }

        $imagen=$filename;
        $titre=strtoupper($_POST['titulo']);


            $database = new medoo();
            $datas = $database->update("articulo", [
            "titulo" => $titre,
            "fecha" => $_POST['fecha'],
            "thumb" => $imagen,
            "detalle" => $_POST['detalle'],
            "autor" => $_POST['autor'],
            "info" => $_POST['descripcion']
            ],[
            "id_articulo" => $_POST['idA']
            ]);

            //var_dump($database);
            header('Location:articulos.php?update=ok');
    }
    else{

        $titre=strtoupper($_POST['titulo']);

        $datas = $database->update("articulo", [
        "titulo" => $titre,
        "fecha" => $_POST['fecha'],
        "detalle" => $_POST['detalle'],
        "autor" => $_POST['autor'],
        "info" => $_POST['descripcion']
        ],[
        "id_articulo" => $_POST['idA']
        ]);
        //var_dump($favo);
         // REDIRECCION EN LISTA DE NOTICIAS
        header('Location: articulos.php?update=ok');
    }

}
else{

    if (!isset($_GET['idA']))
        header('Location: articulos.php');


    $articulos = $database->select("articulo", "*",["id_articulo" => $_GET['idA']]);
    if(empty($articulos))
        header('Location: articulos.php');
    else
        $articulo=$articulos[0];
    //echo '<script type="text/javascript">alert("entra");</script>'; 
}

$block='Art';
$page='modf';
include ('header.php');
?>


<div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-newspaper"></i>Articulo <small>nuevo elemento</small></h2>
                <p class="pagedesc">registro de articulos nuevos</p>
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
                                        <h4><i class="fontello-icon-list-4"></i> Datos Articulo <small>nuevo elemento</small></h4>
                                    </div>
                                    <div class="widget-content">
                                        <div class="widget-body">
                                            <form id="accounForm" class="form-horizontal" method="POST" action="modificarArticulo.php" enctype="multipart/form-data">
                                                
                                                <div class="row-fluid">
                                                    <div class="span12 form-dark">
                                                        <fieldset>
                                                        <input type="hidden" name="accion" value="Agregar">
                                                        <input type="hidden" name="idA" value="<?php echo $_GET['idA']; ?>">
                                                            <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                    
                                                                <li class="control-group">
                                                                    <label class="control-label">Titulo <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span6" type="text" style="text-transform:uppercase;" name="titulo" value="<?php echo $articulo['titulo']; ?>" >
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <label class="control-label">Detalle breve <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span12" type="text"  name="detalle" value="<?php echo $articulo['detalle']; ?>"  required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->                                                                   
                                                                                                                            
                                                                <li class="control-group">
                                                                    <label class="control-label">Fecha<span>*</span></label>
                                                                    <div class="controls">
                                                                        <div id="datetimepicker0" class="input-append date">
                                                                            <input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="fecha" readonly="readonly" value="<?php echo $articulo['fecha']; ?>"/>
                                                                            <span class="add-on">
                                                                              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                                                              </i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->
                                                                <input type="hidden" name="posted" value="">
                                                            
                                                                <li class="control-group">
                                                                    <div class="fileupload fileupload-new controls" data-provides="fileupload">
                                                                        <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"> <img src="../img_art/<?php echo $articulo['thumb']; ?>" /> </div>
                                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                        <div> <span class="btn btn-file"> <span class="fileupload-new">Insertar imagen</span> <span class="fileupload-exists">Cambiar</span>
                                                                            <input type="file" name="file"/>
                                                                            </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a> </div>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <div class="well well-nice form-dark">
                                                                        <h4 class="simple-header">Informacion <small>describa aqui el articulo</small></h4>
                                                                        <div class="control-group">
                                                                            <textarea id="wysiBooEditorBlack" class="input-block-level" style="height: 400px"   name="descripcion" required><?php echo $articulo['info']; ?></textarea>
                                                                            <!-- // fieldset Input Grid Sizig --> 
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    
                                                                        <input  type="hidden" value="<?php echo $_SESSION['name']; ?>" name="autor">
                    
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


