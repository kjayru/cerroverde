<?php 
/*
Template name:responsabilidad-social
*/
get_header(); 
while ( have_posts() ) : the_post();?>
<!--breadcrum-->
<div class="container hidden-xs">
	<div class="row">
   
    <?php echo do_shortcode('[breadcrumb]'); ?>
   </div>
</div>

<section>
	<div class="container pad60">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-2 col-sm-3 col-md-2">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('desarrollo');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10 contenidogeneral">
     
    
    
    
    
    
    <div id="slidereponsabilidad" class="mightyslider_modern_skin">
		<div class="frame">
			<div class="slide_element">
            <?php $slider = get_field("slider",$post->ID);
					
                        foreach($slider as $sli):
						 $img = $sli['fondo'];
                    ?>
            
				<div class="slide" data-mightyslider="cover: '<?php echo $img['url']; ?>'">
					<div class="mSCaption infoBlock infoBlockLeftBlack" data-msanimation="{ speed: 700, easing: 'easeOutQuint', style: { left: 30, opacity: 1 } }">
						<h4 class="inter"><?php echo $sli['titulo'] ?></h4>
						<p><?php echo $sli['subtitulo'] ?></p>
					</div>
					
				</div>
				
                <?php endforeach; ?>
              
			</div>
		</div>
	</div>
    
 <div class="cheron">
        <a href="#" class="rowdown stack1"> <img src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
  </div>


<div class="col-md-12" id="istack1">
       <?php the_content(); ?>
</div>

<div class="especificado col-md-12" style="background: url(<?php echo $imagen['url'];?>) no-repeat right -37px;">
            
        <div class="col-md-5 col-sm-5 col-xs-12 ileft1">
            <div class="col-md-10 col-xs-8"><p><?php echo get_field("texto_bloque_verde",$post->ID); ?></p>
            </div>
            <div class="col-md-2 col-xs-4">
            <a href="<?php echo get_field("enlace_bloque_verde",$post->ID); ?>" class="radiobots">
            <?php $imagen =get_field("imagen_bloque_verde",$post->ID); ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/radioright.png"/></a>
            </div>
        </div>
        <div class=" col-md-7 col-sm-7 col-xs-12 iright" style="background: url(<?php echo $imagen['url'];?>) no-repeat 6px -37px;" >    
        </div>                        
    </div>
</div>
    </div>
   </div>
</section>             
                        
     <?php 
	endwhile;					
				      
get_footer();
