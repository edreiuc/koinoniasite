<?php
    require_once('../clases/medoo.php');

       if(!empty($_POST['accion']))
  { 
    //UPLOAD IMAGEN
     
      $allowedExts = array("gif", "jpeg", "jpg", "png");
      $temp = explode(".",$_FILES["file"]["name"]);
      $extension = end($temp);

      if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
      && ($_FILES["file"]["size"] < 15000000)
      && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
          echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
         /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
         echo "Type: " . $_FILES["file"]["type"] . "<br>";
         echo "Size: " . ($_FILES["file"]["size"] / 4096) . " kB<br>";
         echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/
          if (file_exists("../img_art/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
          } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "../img_art/" . $_FILES["file"]["name"]);
           // echo "Stored in: " . "../img/sitiosdeinteres/" . $_FILES["file"]["name"];
          }
        }
      } else {
        echo "Invalid file";
      }

    $imagen=$_FILES["file"]["name"];
    $titre=strtoupper($_POST['titulo']);

            $database = new medoo();
            $datas = $database->insert("articulo", [
            "titulo" => $titre,
            "fecha" => $_POST['fecha'],
            "thumb" => $imagen,
            "detalle" => $_POST['detalle'],
            "autor" => $_POST['autor'],
            "info" => $_POST['descripcion']
            ]);

            //var_dump($database);
            header('Location:articulos.php?new=2');
    }
$block='Art';
$page='crearArt';
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
                                            <form id="accounForm" class="form-horizontal" method="POST" action="nuevoArticulo.php" enctype="multipart/form-data">
                                                
                                                <div class="row-fluid">
                                                    <div class="span12 form-dark">
                                                        <fieldset>
                                                        <input type="hidden" name="accion" value="Agregar">
                                                            <ul class="form-list label-left list-bordered dotted">
                                                                                                                                                                    
                                                                <li class="control-group">
                                                                    <label class="control-label">Titulo <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span6" type="text" style="text-transform:uppercase;" name="titulo" value="" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item --> 

                                                                <li class="control-group">
                                                                    <label class="control-label">Detalle breve <span>*</span></label>
                                                                    <div class="controls">
                                                                        <input class="span12" type="text"  name="detalle" placeholder="describe de forma breve la actividad" required>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->                                                                 
                                                                                                                            
                                                                <li class="control-group">
                                                                    <label class="control-label">Fecha<span>*</span></label>
                                                                    <div class="controls">
                                                                        <div id="datetimepicker0" class="input-append date">
                                                                            <input data-format="yyyy-MM-dd hh:mm:ss" type="text" name="fecha" readonly="readonly" required/>
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
                                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 120px;"> <img src="http://www.placehold.it/200x120/EFEFEF/AAAAAA&text=no+image" /> </div>
                                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                        <div> <span class="btn btn-file"> <span class="fileupload-new">Insertar imagen</span> <span class="fileupload-exists">Cambiar</span>
                                                                            <input type="file" name="file" required/>
                                                                            </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a> </div>
                                                                    </div>
                                                                </li>
                                                                <!-- // form item -->

                                                                <li class="control-group">
                                                                    <div class="well well-nice form-dark">
                                                                        <h4 class="simple-header">Informacion <small>describa aqui el articulo</small></h4>
                                                                        <div class="control-group">
                                                                            <textarea id="wysiBooEditorBlack" class="input-block-level" style="height: 400px"  placeholder="Ingrese texto..." name="descripcion" required></textarea>
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


