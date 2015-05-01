<?php
require_once('clases/medoo.php');
$database = new medoo();
$datas = $database->select("evento", "*",["ORDER" => "evento.evento DESC"]);
include 'header.php';
?>

<div id="content" class="site-content single">

				<div class="page-inner">
					<div class="container">
                    
						<div id="primary" class="content-area">
							
                            <header class="page-header">
                                <h1 class="page-title">Tinie Tempah - Disc Overy (Official Album Cover)</h1>
                            </header>

                            <div class="recent_news bigthumb">

                                <article class="post clearfix">
                                    <div class="entry-thumb">
                                        <img class="dark_shadow" src="thumb/news/big_thumb1.jpg" alt="News3">
                                    </div>
                                    <div class="entry-detail">
                                        <div class="entry-header">
                                            <div class="entry-meta">
                                                <span class="posted-on">Mar 23, 2014</span>
                                                <span class="sep">/</span>
                                                <span class="posted-author">Post by <a href="#">WPcharming</a></span>
                                                <span class="comments-link">
                                                    <span class="sep">/</span>
                                                    <a href="#">4 Comments</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <p>What happens next seems almost unreal. Thousands of fans respond to her on the net, attracting the attention of professionals, and the interest of Because Music. Quisque a turpis ut dolor porta auctor a sed risus. Quisque turpis arcu, congue in tincidunt quis, feugiat a erat. Vivamus tincidunt semper ultricies. Integer sit amet facilisis quam. Sed vitae nibh odio. Sed nec neque id nunc ornare rhoncus. Donec congue accumsan justo, vitae mollis ipsum pharetra eu.</p>
                                            <p>Ut luctus justo elit, sit amet sodales purus vulputate non. Nullam lorem eros, posuere nec sodales at, aliquet gravida dui. Aenean id tellus in libero porta ultricies. Donec viverra interdum bibendum. Sed varius nunc tortor, tempus accumsan massa aliquam sed. Quisque a turpis ut dolor porta auctor a sed risus. Quisque turpis arcu, congue in tincidunt quis, feugiat a erat. Vivamus tincidunt semper ultricies. Integer sit amet facilisis quam. Sed vitae nibh odio. Sed nec neque id nunc ornare rhoncus. Donec congue accumsan justo, vitae mollis ipsum pharetra eu.</p>
                                            <h4>In hac habitasse platea dictumst</h4>
                                            <p>Vivamus et eleifend massa. Suspendisse nec arcu et ligula posuere aliquam. Integer quis arcu vitae nisi sodales tincidunt. Praesent pretium, massa ut consequat commodo, libero turpis dignissim lacus, facilisis porttitor risus mi vitae purus.</p>
                                            <p>What happens next seems almost unreal. Thousands of fans respond to her on the net, attracting the attention of professionals, and the interest of Because Music. Quisque a turpis ut dolor porta auctor a sed risus. Quisque turpis arcu, congue in tincidunt quis, feugiat a erat. Vivamus tincidunt semper ultricies. Integer sit amet facilisis quam. Sed vitae nibh odio. Sed nec neque id nunc ornare rhoncus. Donec congue accumsan justo, vitae mollis ipsum pharetra eu.</p>
                                            
                                        </div>
                                        <div class="entry-footer">
                                            <i class="file icon"></i>
                                            <ul class="post-categories">
                                                <li><a rel="category tag" title="View all posts in antiquarianism" href="#">Antiquarianism</a></li>
                                                <li><a rel="category tag" title="View all posts in arrangement" href="#">Arrangement</a></li>
                                                <li><a rel="category tag" title="View all posts in asmodeus" href="#">Asmodeus</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>

                                <!--COMMENTS FACEBOOK-->

                            </div>

						</div> <!-- END #primary -->


<?php
include 'asside.php';
include 'footer.php';
?>