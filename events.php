<?php
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
                                    
                                    <article  class="post event_item dark_shadow clearfix">
                                        <div class="event_left">
                                            <div class="event_date">18</div>
                                            <div class="event_month">Feb</div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="single_event.html">koinonia test</a></h2>
                                            <div class="event_time"><i class="time icon"></i> February 18, 2014 a 9:00 AM</div>
                                            <div class="event_location"><i class="map marker icon"></i> Merida, yucatan, 97000 </div>
                                            <a href="#" class="event_button ui button ">Mas info</a>
                                        </div>
                                    </article>

                                    <article  class="post event_item dark_shadow clearfix">
                                        <div class="event_left">
                                            <div class="event_date">18</div>
                                            <div class="event_month">Feb</div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="single_event.html">koinonia test</a></h2>
                                            <div class="event_time"><i class="time icon"></i> February 18, 2014 a 9:00 AM</div>
                                            <div class="event_location"><i class="map marker icon"></i> Merida, yucatan, 97000 </div>
                                            <a href="#" class="event_button ui button ">Mas info</a>
                                        </div>
                                    </article>

                                    
                                </div>

                            </div>

						</div> <!-- END #primary -->

						<div id="secondary" class="widget-area" role="complementary">

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