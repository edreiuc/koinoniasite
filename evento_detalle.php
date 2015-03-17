<?php
require_once('clases/medoo.php');
$database = new medoo();
$datas = $database->select("evento", "*", [
  "AND" => [
  "id_evento" => $_GET['id']
  ]
]);
$data=$datas[0];
if(!isset($data['id_evento']))
{
    header('Location:events.php');
}

include 'header.php';
?>

	<div id="content" class="site-content">

				<div class="page-inner">
					<div class="container">
                    
						<div id="primary" class="content-area">
							
                            <header class="page-header">
                                <h1 class="page-title"><?php echo $data['evento']; ?></h1>
                            </header>

                                <div class="event_single">
                                
                                    <div class="event_widget">
                                        <?php
                                        $time= strtotime($data['fecha']);
                                        echo '
                                        <div class="event_item has_map dark_shadow clearfix">
                                            <div class="event_map">
                                                <iframe src="'.$data['embed'].'" width="600" height="250" frameborder="0" style="border:0"></iframe>
                                            </div>
                                            <div class="event_left">
                                                <div class="event_date">'.date('d', $time).'</div>
                                                <div class="event_month">'.date('M', $time).'</div>
                                            </div>
                                            <div class="event_detail">
                                                
                                                <div class="event_time"><i class="time icon"></i>'.date('M', $time).' '.date('d', $time).', '.date('Y', $time).' a '.date('h:i a', $time).'</div>
                                                <div class="event_location"><i class="map marker icon"></i> '.$data['direccion'].'</div>
                                            </div>
                                        </div>
                                        <article class="post">

                                            <div class="entry-content">
                                                <h2>Descripción</h2>
                                                <p>'.$data['descripcion'].'</p>
                                            </div>

                                        </article>
                                        ';
                                        ?>
                                    </div>
                                </div>

						</div> <!-- END #primary -->


<?php
include 'asside.php';
include 'footer.php';
?>