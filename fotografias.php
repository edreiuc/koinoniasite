<?php
include 'header.php';
?>

<div id="content" class="site-content">

				<div class="page-inner">
					<div class="container">
                        
                        <header class="page-header">
                            <h1 class="page-title">Fotografías</h1>
                        </header>
						
                        <div class="page-content">

                            <div id="gallery-slideshow" class="royalSlider rsDefault">
                                <a class="rsImg" data-rsw="940" data-rsh="500" data-rsbigimg="thumb/gallery/gallery1.jpg" href="thumb/gallery/gallery1_940_500.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img class="rsTmb" src="thumb/gallery/gallery1_96_72.jpg" height="72" width="96"></a>
                                <a class="rsImg" data-rsw="940" data-rsh="500" data-rsbigimg="thumb/gallery/gallery2.jpg" href="thumb/gallery/gallery2_940_500.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img class="rsTmb" src="thumb/gallery/gallery2_96_72.jpg" height="72" width="96"></a>
                                <a class="rsImg" data-rsw="940" data-rsh="500" data-rsbigimg="thumb/gallery/gallery3.jpg" href="thumb/gallery/gallery3_940_500.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img class="rsTmb" src="thumb/gallery/gallery3_96_72.jpg" height="72" width="96"></a>
                                <a class="rsImg" data-rsw="940" data-rsh="500" data-rsbigimg="thumb/gallery/gallery4.jpg" href="thumb/gallery/gallery4_940_500.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img class="rsTmb" src="thumb/gallery/gallery4_96_72.jpg" height="72" width="96"></a>
                                <a class="rsImg" data-rsw="940" data-rsh="500" data-rsbigimg="thumb/gallery/gallery5.jpg" href="thumb/gallery/gallery5_940_500.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img class="rsTmb" src="thumb/gallery/gallery5_96_72.jpg" height="72" width="96"></a>
                                <a class="rsImg" data-rsw="940" data-rsh="500" data-rsbigimg="thumb/gallery/gallery6.jpg" href="thumb/gallery/gallery6_940_500.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img class="rsTmb" src="thumb/gallery/gallery6_96_72.jpg" height="72" width="96"></a>


                            </div>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                  $('#gallery-slideshow').royalSlider({
                                    fullscreen: {
                                      enabled: true,
                                      nativeFS: true
                                    },
                                    controlNavigation: 'thumbnails',
                                    autoScaleSlider: true, 
                                    autoScaleSliderWidth: 960,     
                                    autoScaleSliderHeight: 600,
                                    loop: false,
                                    imageScaleMode: 'fit-if-smaller',
                                    navigateByClick: true,
                                    numImagesToPreload:2,
                                    arrowsNav:true,
                                    arrowsNavAutoHide: true,
                                    arrowsNavHideOnTouch: true,
                                    keyboardNavEnabled: true,
                                    fadeinLoadedSlide: true,
                                    globalCaption: false,
                                    globalCaptionInside: false,
                                    thumbs: {
                                      appendSpan: true,
                                      firstMargin: true,
                                      paddingBottom: 4
                                    }
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