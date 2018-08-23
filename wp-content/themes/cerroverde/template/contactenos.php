<?php 
/*
Template name:contactenos
*/
get_header();
while ( have_posts() ) : the_post(); ?>
<!--breadcrum-->
<div class="container hidden-xs">
	<div class="row">
    <?php echo do_shortcode('[breadcrumb]'); ?>
   </div>
</div>

<section >
	<div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
		  <div class="col-lg-12 col-sm-12 col-md-12 bottom100">
               <div class="headblock">
                  <div class="col-md-6">
                  
                   <?php $imagen = get_field('imagen',$post->ID); ?>
                   <h1 class="titulo">
                   	Contáctanos
                   </h1>
               	   <img src="<?php echo $imagen['url']; ?>"  class="img-responsive ">
                    
                  </div>  
                  <div class="col-md-6">
                     <div class="bloque-text">
                     	<ul>
                        	<li class="bt1"><span><img src="<?php echo get_template_directory_uri() ?>/img/house.png" alt=""></span><strong>Dirección:</strong> <?php echo get_field('direccion',$post->ID); ?></li>
                            <li class="bt2"><span><img src="<?php echo get_template_directory_uri() ?>/img/mail.png" alt=""></span><strong>Mail:</strong> <?php echo get_field('mail',$post->ID); ?></li>
                            <li class="bt3"><span><img src="<?php echo get_template_directory_uri() ?>/img/phone.png" alt=""></span><strong>Teléfono:</strong> <?php echo get_field('telefono',$post->ID); ?></li>
                        </ul>
                        <?php the_content(); ?>
                     </div>
                    </div>  
                   
               </div>
            
         </div>
    </div>
   </div>
</section>             
                        
     <?php 
	endwhile;			
get_footer();
