<?php
include 'header.php';
?>

	<div id="content" class="site-content">

				<div class="page-inner">
					<div class="container">
                    
						<div id="primary" class="content-area">
							
                            <header class="page-header">
                                <h1 class="page-title">Nombre evento</h1>
                            </header>

                                <div class="event_single">
                                
                                    <div class="event_widget">

                                        <div class="event_item has_map dark_shadow clearfix">
                                            <div class="event_map">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9514634977954!2d-122.08096280000004!3d37.414622099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb755a2bbfcef%3A0x7207e9609eaa06cd!2s1500+N+Shoreline+Blvd%2C+Mountain+View%2C+CA+94043!5e0!3m2!1sen!2s!4v1409742972066" width="600" height="250" frameborder="0" style="border:0"></iframe>
                                            </div>
                                            <div class="event_left">
                                                <div class="event_date">18</div>
                                                <div class="event_month">Feb</div>
                                            </div>
                                            <div class="event_detail">
                                                
                                                <div class="event_time"><i class="time icon"></i> Febrero 18, 2014 9:00 AM</div>
                                                <div class="event_location"><i class="map marker icon"></i> Merida, yucatan, 97000</div>
                                            </div>
                                        </div>
                                        <article class="post">

                                            <div class="entry-content">
                                                <h2>Aliquam congue Consectetur adipisci</h2>
                                                <p>Enim ad minima ven m, quis nost. Rum exercitationem ullam. Corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? quis autem vel eum iure reprehenderit Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue Consectetur adipisci. Belit, sed quia non numquam eius modi tempora incidunt, ut labore et</p>
                                                <p>Dolore ater magnam aliquam quaerat voluptatem. ut enim ad minima ven m, quis nost. Rum exercitationem ullam.  Corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? quis autem vel eum iure reprehenderit Fusce euismod consequat ante</p>
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