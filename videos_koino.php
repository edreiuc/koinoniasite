<?php
include 'header.php';
?>


			<div id="content" class="site-content">

				<div class="page-inner">
					<div class="container">
                        
                        <header class="page-header">
                            <h1 class="page-title">Nuestros Videos</h1>
                        </header>
						
                        <div class="page-content">

                            <div class="rsVideos">
                                <div id="video-gallery" class="royalSlider videoGallery rsDefault">
                                    <a class="rsImg" data-rsw="843" data-rsh="473" data-rsvideo="http://www.youtube.com/watch?v=HFbHRWwyihE" href="http://dimsemenov.com/plugins/royal-slider/img/admin-video.png">
                                        <div class="rsTmb">
                                            <h5>Tu eres</h5>
                                            <span>Prez</span>
                                        </div>
                                    </a>

                                    <a class="rsImg" data-rsvideo="https://vimeo.com/45830194" href="http://b.vimeocdn.com/ts/319/715/319715493_640.jpg">
	                                    <div class="rsTmb">
		                                    <h5>Como es posible</h5>
		                                    <span>Tercer Piso</span>
	                                    </div>
                                    </a>
                                    
                                    <a class="rsImg" data-rsvideo="https://vimeo.com/31240369" href="http://b.vimeocdn.com/ts/210/393/210393954_640.jpg">
	                                    <div class="rsTmb">
		                                    <h5>Be without you</h5>
		                                    <span>Toby Mac</span>
	                                    </div>
                                    </a>
                                   
                                    <a class="rsImg" data-rsvideo="https://vimeo.com/44878206" href="http://b.vimeocdn.com/ts/311/891/311891198_640.jpg">
	                                    <div class="rsTmb">
		                                    <h5>Como tu</h5>
		                                    <span>Harold Guerra</span>
	                                    </div>
                                    </a>
                                    
                                </div>
                            </div>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                  $('#video-gallery').royalSlider({
                                    arrowsNav: false,
                                    fadeinLoadedSlide: true,
                                    controlNavigationSpacing: 0,
                                    controlNavigation: 'thumbnails',

                                    thumbs: {
                                      autoCenter: false,
                                      fitInViewport: true,
                                      orientation: 'vertical',
                                      spacing: 0,
                                      paddingBottom: 0
                                    },
                                    keyboardNavEnabled: true,
                                    imageScaleMode: 'fill',
                                    imageAlignCenter:true,
                                    slidesSpacing: 0,
                                    loop: false,
                                    loopRewind: true,
                                    numImagesToPreload: 3,
                                    video: {
                                      autoHideArrows:true,
                                      autoHideControlNav:false,
                                      autoHideBlocks: true
                                    }, 
                                    autoScaleSlider: true, 
                                    autoScaleSliderWidth: 960,     
                                    autoScaleSliderHeight: 450,

                                    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
                                    imgWidth: 640,
                                    imgHeight: 360

                                  });
                                });
                            </script>
                            
                           
                        </div> <!--/ .page-content -->

					</div>
				</div> <!-- END .page-inner -->

			</div><!-- END #content -->

            </div>
		</div> <!-- END #boxed-wrapper -->

<?php
include 'footer.php';
?>