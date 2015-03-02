<?php
include 'header.php';
?>


<div id="content" class="site-content single">

				<div class="page-inner">
					<div class="container">
                    
						<div id="primary" class="content-area">
							
                            <header class="page-header">
                                <h1 class="page-title">Contactanos</h1>
                            </header>

                            <div class="entry-content">
                                <div class="map-contact">hp
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d932.2193051382467!2d-89.36307570674589!3d20.836663881457334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5689a6d673e1f5%3A0xdb35fb5acd639cac!2zMjAsIDk3NTcwIFNlecOpLCBZdWMu!5e0!3m2!1ses-419!2smx!4v1425273519057" width="100%" height="250" frameborder="0" style="border:0"></iframe>
                                    <div class="address ui three doubling column grid">
                                        <div class="column">
                                            <i class="home icon"></i> Seye, Yucatan, Calle 20 No.3 Col Sn. Jose 
                                        </div>
                                        <div class="column">
                                            <i class="call icon"></i> +1 234-456-1122
                                        </div>
                                        <div class="column">
                                            <i class="mail outline icon"></i> koinonia@gmail.com.mx
                                        </div>
                                    </div>
                                </div>
                                <h4>Usa el formulario para contactarnos</h4>
                                <p>Mauris ullamcorper nibh quis leo ultrices in hendrerit velit tristiqueut augue in nulla lacinia bibendum liberoras rutrum ac purus ut tristique. Nullam placerat lacinia dolor quis pretium</p>
                                <form id="contact_form" name="contact_form" method="post" action="#">
                                    <div class="form-row field_text">
                                        <label for="contact_name">Nombre </label><em>(required)</em><br>
                                        <input id="contact_name" class="input_text required" type="text" value="" name ="contact_name">
                                    </div>
                                    <div class="form-row field_text">
                                        <label for="contact_phone">Telefono </label><em>(optional)</em><br>
                                        <input id="contact_phone" class="input_text" type="text" value="" name ="contact_phone">
                                    </div>

                                    <div class="form-row field_text">
                                        <label for="contact_email">E-mail </label><em>(required)</em><br>
                                        <input id="contact_email" class="input_text required" type="text" value="" name ="contact_email">
                                    </div>
                                    <div class="form-row field_text">
                                        <label for="contact_subject">Asunto </label><em>(required)</em><br>
                                        <input id="contact_subject" class="input_text required" type="text" value="" name ="contact_subject">
                                    </div>
                                    <div class="form-row field_textarea">
                                        <label for="contact_message">Mensaje: </label><br>
                                        <textarea id="contact_message" class="input_textarea" type="text" value="" name ="contact_message"></textarea>
                                    </div>
                                    <div class="form-row field_submit">
                                        <input type="submit" value="Enviar ahora" id="contact_submit" class="ui button colored">
                                        <span class="loading hide"><img src="assets/images/preloader.gif"></span>
                                    </div>
                                    <div class="form-row notice_bar">
                                        <p class="notice notice_ok hide">Gracias, te responderemos lo antes posible.</p>
                                        <p class="notice notice_error hide">Lo sentimos intenta mas tarde</p>
                                    </div>
                                </form> <!-- END #contact_form -->
                                
                            </div>

						</div> <!-- END #primary -->

						<div id="secondary" class="widget-area" role="complementary">
							<aside class="widget event_widget">
                                <h4 class="widget-title">Novedades</h4>
                                <div class="widget-content">

                                    <article class="post">
                                        <div class="event_left">
                                            <div class="event_date">16</div>
                                            <div class="event_month">Feb</div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="#">Festival cristiano</a></h2>
                                            <div class="event_time"><i class="time icon"></i> Febrero 16, 2015  9:00 AM</div>
                                            <div class="event_location"><i class="map marker icon"></i> Merida, 97000</div>
                                            <a href="#" class="event_button ui button">Mas info</a>
                                        </div>
                                    </article>
                                    <article class="post">
                                        <div class="event_left">
                                            <div class="event_date">26</div>
                                            <div class="event_month">Mar</div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="#">Taller de musica</a></h2>
                                            <div class="event_time"><i class="time icon"></i> Marzo 26, 2015  8:00 AM</div>
                                            <div class="event_location"><i class="map marker icon"></i> Merida, 97000</div>
                                            <a href="#" class="event_button ui button">Cancelado</a>
                                        </div>
                                    </article>

                                    <article class="post">
                                        <div class="event_left">
                                            <div class="event_date">29</div>
                                            <div class="event_month">Mar</div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="#">Concierto cena</a></h2>
                                            <div class="event_time"><i class="time icon"></i> Marzo 29, 2015 8:00 AM</div>
                                            <div class="event_location"><i class="map marker icon"></i> Uman, 97390</div>
                                            <a href="#" class="event_button ui button">Mas info</a>
                                        </div>
                                    </article>

                                </div>
                            </aside>

                            <aside id="widget_name" class="widget video_slider">
                                <h4 class="widget-title">video recomendado</h4>
                                <div class="widget-content dark_shadow">
                                    <div id="simple-vertical" class="royalSlider rsDefault">
                                        <a class="rsImg" data-rsvideo="http://vimeo.com/92080767" href="http://i.vimeocdn.com/video/473391743_960.jpg"></a>
                                        <a class="rsImg" data-rsvideo="http://vimeo.com/45830194" href="http://b.vimeocdn.com/ts/319/715/319715493_640.jpg"></a>
                                    </div>
                                    <script type="text/javascript">
                                    jQuery(document).ready(function($) {
                                    $(window).load(function() {
                                        $('#simple-vertical').royalSlider({
                                            arrowsNav: true,
                                            arrowsNavAutoHide: false,
                                            fadeinLoadedSlide: true,
                                            controlNavigation: 'none',
                                            imageScaleMode: 'fill',
                                            imageAlignCenter:true,
                                            loop: false,
                                            loopRewind: false,
                                            numImagesToPreload: 4,
                                            slidesOrientation: 'horizontal',
                                            keyboardNavEnabled: true,
                                            video: {
                                              autoHideArrows:true,
                                              autoHideControlNav:true
                                            },  

                                            autoScaleSlider: true, 
                                            autoScaleSliderWidth: 960,     
                                            autoScaleSliderHeight: 650,

                                            /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
                                            imgWidth: 640,
                                            imgHeight: 260
                                          });
                                    });
                                    });
                                    </script>
                                </div>
                            </aside>

                            <aside class="widget widget_twitter">
                                <h4 class="widget_heading">Twitter Feed</h4>
                                <div class="widget_content">
                                    <ul>
                                        <li>
                                        Ut enim ad minim veniam <a href="http://t.co/LRyHvAcxeF">http://t.co/LRyHvAcxeF</a><br>
                                        <small>July 17, 2014 09:07 pm</small>
                                        </li>

                                        <li>
                                        Quis nostrud exercitation <a href="http://t.co/LRyHvAcxeF">http://t.co/LRyHvAcxeF</a><br>
                                        <small>July 17, 2014 09:07 pm</small>
                                        </li>
                                    </ul>
                                </div>
                            </aside>

						</div> <!-- END secondary -->
					</div>
				</div> <!-- END .page-inner -->

			</div><!-- END #content -->

            </div>
		</div> <!-- END #boxed-wrapper -->


<?php
include 'footer.php';
?>