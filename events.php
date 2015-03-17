<?php
require_once('clases/medoo.php');
$database = new medoo();
$datas = $database->select("evento", "*",["ORDER" => "evento.evento DESC"]);
include 'header.php';
?>

	<div id="content" class="site-content">

				<div class="page-inner">
					<div class="container">
                    
						<div id="primary" class="content-area">
							
                            <header class="page-header">
                                <h1 class="page-title">Calendario de eventos</h1>
                            </header>

                            <div class="events_page">
                                
                                <div class="event_widget">
                                    <?php 
                                    
                                    foreach ($datas as $data) {
                                        $time= strtotime($data['fecha']);
                                        echo '
                                            <article  class="post event_item dark_shadow clearfix">
                                                <div class="event_left">
                                                    <div class="event_date">'.date('d', $time).'</div>
                                                    <div class="event_month">'.date('M', $time).'</div>
                                                </div>
                                                <div class="event_detail">
                                                    <h2 class="event_title"><a href="single_event.html">'.$data['evento'].'</a></h2>
                                                    <div class="event_time"><i class="time icon"></i> '.date('M', $time).' '.date('d', $time).', '.date('Y', $time).' a '.date('h:i a', $time).'</div>
                                                    <div class="event_location"><i class="map marker icon"></i> '.$data['direccion'].'</div>
                                                    <a href="evento_detalle.php?id='.$data['id_evento'].'" class="event_button ui button ">Mas info</a>
                                                </div>
                                            </article>   
                                       ';
                                    } ?>                                 
                                </div>

                            </div>

						</div> <!-- END #primary -->

<?php
include 'asside.php';
include 'footer.php';
?>