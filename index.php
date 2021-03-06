<?php
require_once('clases/medoo.php');
$database = new medoo();
$datas = $database->select("articulo", "*",["ORDER" => "articulo.fecha DESC"]);

include 'header.php';
?>
<div id="content" class="site-content">

                <div id="home-slider-1" class="royalSlider rsMinW">

                  <div class="rsContent slide2">
                    <a class="rsImg" href="thumb/slider1.jpg">Slider1</a>
                    <div class="bContainer">
                        <div class="rsABlock rs_text rs_text_meta" data-move-effect="top">sitio web koinonia</div>
                        <div class="rsABlock rs_text_box" data-move-effect="bottom">
                            <span>=== BIENVENIDO ===</span>
                        </div>
                        <div class="rsABlock" data-move-effect="bottom">
                            <a href="#" class="ui huge button colored">Me gusta</a>
                        </div>
                    </div>
                  </div>

                  <div class="rsContent slide1">
                    <a class="rsImg" href="thumb/slider2.jpg">Slider 2</a>
                    <div class="bContainer">
                        <div class="rsABlock rs_text rs_text_meta" data-move-effect="top">Canta, Danza, Grita, Regozijate</div>
                        <div class="rsABlock rs_text_box" data-move-effect="bottom">
                            <span>Disfruta la Alabanza</span>
                        </div>
                        <div class="rsABlock" data-move-effect="bottom">
                            <a href="#" class="ui huge button colored">Acompañanos</a>
                        </div>
                    </div>
                  </div>

                  <div class="rsContent slide3 rsVideo">
                    <a class="rsImg" href="thumb/slider3.jpg" data-rsvideo="https://www.youtube.com/watch?v=m6grs-tLvRg" data-rsw="1038" data-rsh="500">Slider 3</a>
                    <div class="bContainer">
                        <div class="rsABlock rs_text rs_text_meta" data-move-effect="top"> </div>
                        <div class="rsABlock rs_text_box" data-move-effect="bottom">
                            <span>Video Tu eres (PREZ)</span>
                        </div>
                    </div>
                  </div>

                  <div class="rsContent slide4">
                    <a class="rsImg" href="thumb/slider4.jpg">Slider 3</a>
                    <div class="bContainer">
                        <div class="rsABlock rs_text rs_text_meta" data-move-effect="top">¿Tienes un evento?</div>
                        <div class="rsABlock rs_text_box" data-move-effect="bottom">
                            <span>COMENTANOS</span>
                        </div>
                        <div class="rsABlock" data-move-effect="bottom">
                            <a href="#" class="ui huge button colored">contacto</a>
                        </div>
                    </div>
                  </div>
                  
                </div> <!-- END royalSlider -->
                
                <div class="page-inner">
                    <div class="container">
                        
                        <section class="top_feature">
                            <div class="two column stackable ui grid">
                                <div class="column">
                                    <div id="favoriteplay" class="box_content_wrapper">
                                        <h4 class="widget_heading">Lista de reproducción</h4>
                                        <div class="box_content">
                                            <div class="player_box dark_shadow">
                                                <div class="player_area">
                                                    <script type="text/javascript">
                                                    jQuery(document).ready(function($) {
                                                        var myPlaylist = [

                                                            {
                                                                mp3:'thumb/audio/matteos_situmelopides.mp3',
                                                                //oga:'thumb/audio/1.ogg',
                                                                title:'Si tu me lo pides',
                                                                artist:'Matteos',
                                                                rating:4,
                                                                buy:'',
                                                                duration:'3:00'
                                                                //cover:'mix/1.png'
                                                            },
                                                            {
                                                                mp3:'thumb/audio/Maybe.mp3',
                                                                //oga:'thumb/audio/1.ogg',
                                                                title:'Maybe',
                                                                artist:'Ole Borud',
                                                                rating:5,
                                                                buy:'',
                                                                
                                                                duration:'3:00'
                                                                //cover:'mix/1.png'
                                                            },
                                                            {
                                                                mp3:'thumb/audio/Dueño.mp3',
                                                                //oga:'thumb/audio/1.ogg',
                                                                title:'Dueño',
                                                                artist:'Sonnus',
                                                                rating:4,
                                                                buy:'',
                                                                
                                                                duration:'3:00'
                                                            }
                                                        ];

                                                        $('.player_area').ttwMusicPlayer(myPlaylist, {
                                                            autoPlay:false,
                                                            tracksToShow:2,
                                                            jPlayer:{
                                                                swfPath:'assets/js' //You need to override the default swf path any time the directory structure changes
                                                            }
                                                        });
                                                    });
                                                </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div id="albums_carousel" class="box_content_wrapper">
                                        <h4 class="widget_heading">Wallpapers</h4>
                                        <div class="box_content">
                                            <div class="home_album_carousel owl-carousel">
                                                <div class="ac_item dark_shadow">
                                                    <a href="#">
                                                        <img src="thumb/album/album1.jpg" alt="">
                                                        <div class="overlay"></div>
                                                        <div class="overlay_title">
                                                            <h2>Wallpaper 1</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="ac_item dark_shadow">
                                                    <a href="#">
                                                        <img src="thumb/album/album2.jpg" alt="">
                                                        <div class="overlay"></div>
                                                        <div class="overlay_title">
                                                            <h2>Wallpaper 2</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="ac_item dark_shadow">
                                                    <a href="#">
                                                        <img src="thumb/album/album3.jpg" alt="">
                                                        <div class="overlay"></div>
                                                        <div class="overlay_title">
                                                            <h2>Wallpaper 3</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="ac_item dark_shadow">
                                                    <a href="#">
                                                        <img src="thumb/album/album4.jpg" alt="">
                                                        <div class="overlay"></div>
                                                        <div class="overlay_title">
                                                            <h2>Wallpaper 4</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                                <script type="text/javascript">
                                                jQuery(document).ready(function($) {
                                                        $(".home_album_carousel").owlCarousel({
                                                            items : 2,
                                                            itemsDesktop: [1199,2],
                                                            itemsDesktopSmall: [979,1],
                                                            itemsTablet: [768,2],
                                                            navigationText: ['<i class="angle left icon"></i>','<i class="angle right icon"></i>'],
                                                            lazyLoad : true,
                                                            navigation : true
                                                        });
                                                });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        

                        

                        <div id="primary" class="content-area">
                            
                            <div class="recent_news">
                                <h4 class="widget_heading">Articulos Recientes</h4>

                                <?php 
                                foreach ($datas as $data) 
                                {

                                $time= strtotime($data['fecha']);
                                echo '<article class="post clearfix">
                                    <div class="entry-thumb">
                                       
                                            <img class="dark_shadow" style="height:170px;" src="img_art/'.$data['thumb'].'" alt="'.$data['titulo'].'">
                               
                                    </div>
                                    <div class="entry-detail">
                                        <div class="entry-header">
                                            <h2 class="entry-title">'.$data['titulo'].'</h2>
                                            <div class="entry-meta">
                                                <span class="posted-on">'.date('M', $time).' '.date('d', $time).', '.date('Y', $time).'</span>
                                            </div>
                                            <div class="entry-content">
                                                <p>'.$data['detalle'].'</p>
                                            </div>
                                            <div class="entry-more">
                                                <a href="articulo.php?idA='.$data['id_articulo'].'" class="ui button">Leer más</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>';
                                }
                                ?>                                
                            </div>

                        </div> <!-- END #primary -->

                        <div id="secondary" class="widget-area" role="complementary">
                            <aside class="widget event_widget">
                                <h4 class="widget-title">Seguidores</h4>
                                <div class="widget-content">
                                  <div class="fb-like-box" data-href="https://www.facebook.com/koinoniaband" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                                </div>
                            </aside>

                            <aside class="widget">
                                <h4 class="widget-title">Top</h4>
                                <div class="widget-content dark_shadow">
                                    <div class="video_lightbox">
                                        <a class="popup-vimeo" href="https://vimeo.com/41132461">
                                            <img src="http://b.vimeocdn.com/ts/284/709/284709146_640.jpg" alt="">
                                            <span class="video_button"></span>
                                        </a>
                                    </div>
                                </div>
                            </aside>

                           <aside class="widget">
                                <h4 class="widget-title">SoundCloud koinonia</h4>
                                <div class="widget-content dark_shadow">
                                    <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/71305054&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                                </div>
                            </aside>

                        </div> <!-- END secondary -->                                

                    </div><!--/.container -->
                    
                    

                </div> <!-- END .page-inner -->

            </div><!-- END #content -->

            </div>
</div> <!-- END #boxed-wrapper -->

<?php
include 'footer.php';
?>