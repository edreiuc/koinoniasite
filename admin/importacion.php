<?php
$block='import';
$page='nuevoimport';
include ('header.php');
?>

 <div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-monitor"></i> Importaciones <small> base de datos</small></h2>
                <p class="pagedesc">Importe archivos en CSV a base de datos </p>
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
                                <form enctype="multipart/form-data" action="acciones.php" method="POST">
                                    <input type="hidden" name="accion" value="Agregar">
                                    <h4 class="simple-header"> Ingrese archivo <small>CSV</small></h4>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input span4"> <i class="fontello-icon-doc-2 fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
                                            <span class="btn btn-file"> <span class="fileupload-new">Select file</span> <span class="fileupload-exists">Change</span>
                                            <input type="file" accept=".csv" name="file"/>
                                            </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> 
                                        </div>
                                    </div>
                                   
                                        <button type="submit" class="btn btn-blue">Validar</button>
                                </form>

                            </div>
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


<?php	
include ('footer.php');
?>


