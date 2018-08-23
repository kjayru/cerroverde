<?php 
/*
Template name:mision-vision
*/
get_header();
while ( have_posts() ) : the_post();
 ?>
<!--breadcrum-->
<div class="container hidden-xs">
	<div class="row">
    <?php echo do_shortcode('[breadcrumb]'); ?>
   </div>
</div>

<section>
	<div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-2 col-sm-3 col-md-2">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('conocenos');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10">
            	<?php
				
					the_content();
				
					$logros = get_field('logros',$post->ID);
					foreach($logros as $lg):
							 $imgs = $lg['imagen'];
					?>
				
                
                <div class="col-md-12 iniciativa vision">
                
                  		<div class="row">
                        	<div class="col-md-12 col-xs-12 itemini">
                            	<div class="col-md-2  hidden-xs">
                                	<!--<div class="box-p">
                                    	<img src="<?php echo $imgs['url']; ?>" alt="" class="img-responsive">
                                    </div>-->
                                </div>
                                <div class="col-md-10 col-xs-12">
                                	<h3><?php echo $lg['titulo']; ?></h3>
                                    <h4><?php echo $lg['subtitulo']; ?></h4>
                                    <ul>
                                	<?php foreach($lg['lista'] as $list):?>
                                    <li><?php echo $list['item']?></li>
                                    <?php endforeach; ?>
									</ul>
                                </div>
                            </div>
  
                            
                        </div>
                  </div>
                  <?php endforeach; ?>
            </div>
    </div>
   </div>
</section>                
                        
     <?php 
		endwhile;			
				      
get_footer();
