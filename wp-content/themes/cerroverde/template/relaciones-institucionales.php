<?php 
/*
Template name:relaciones-institucionales
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
            <?php $bloques = get_field('header',$post->ID);
							
						 ?>
            <div id="slidecirculo" class="mightyslider_modern_skin">
				    <div class="frame3">
				        <div class="slide_element">
				            <!-- SLIDES -->
				   <?php  
					
					
					
					foreach($bloques as $bl):
							 $imgsli = $bl['imagen'];
					?>

				            <div class="slide" data-mightyslider="cover:'<?php echo $imgsli['url'];?>'">
				                <div class="mSCaption infoBlock" data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }">
				              <h4 class="inter"><?php echo $bl['titulo'];?></h4>
				                <div class="descripcion">
                            	
								   <?php echo $bl['contenido'];?>
                                </div>   
				            </div>
				        </div>
					<?php 
					endforeach;
					?>
				       
				        <!-- END OF SLIDEELEMENT -->
				    </div>
				</div>
			</div>
	
    
            <div class="cheron">
				<a href="#" class="rowdown stack1"> <img src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			</div>
               <div class="col-md-12" id="istack1">
					<?php
                 
                        the_content();
                   
    
                    ?>
                </div>
            </div>
    </div>
   </div>
</section>                
                        
     <?php 
 endwhile;	
get_footer();
