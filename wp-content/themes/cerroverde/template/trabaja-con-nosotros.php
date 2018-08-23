<?php 
/*
Template name:trabaja-con-nosotros
*/
get_header();
while ( have_posts() ) : the_post(); ?>
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
	   
			<div class="col-lg-12 col-sm-12 col-md-12">
                <div class="headblock" style="position:relative;">
                   <?php $imagen = get_field('imagen',$post->ID);
                        $imagen2 = get_field('imagen_bloque_verde',$post->ID);
                     ?>
                    <img src="<?php echo $imagen['url']; ?>"  class="img-responsive center-block">
                    <div class="textohead">Trabaja con nosotros</div>
                </div>
               
               
                <div class="contenido">
                	<?php the_content(); ?>
                
                
               <?php 
			   $i = 0;
			    $bloques = get_field('bloque',$post->ID);
					foreach($bloques as $bloque):
				 
				 $bl_imagen = $bloque['imagen'];
			   ?>
                 <div class="col-md-10  col-lg-8  col-sm-10  blq-trabaja <?php  if($i==0){ echo  "col-md-offset-1 col-lg-offset-2 col-sm-offset-1"; }  ?>" style="margin-top:40px;">
                    <div class="col-md-4">
                        <figcaption style="background:url(<?php echo $bl_imagen['url']; ?>) no-repeat center center; background-size:cover;">
                         <!--<img src="<?php echo $bl_imagen['url']; ?>" class="center-block">-->
                        </figcaption>
                    </div>
                    <div class="col-md-8">
                         <div class="titulo">
                           <?php echo $bloque['titulo'];?>
                         </div>
                         <div class="texto"> 
                           <?php echo $bloque['contenido'];?>
                         </div>
                         <a href="<?php echo $bloque['enlace'];?>" target="_blank" class="btn btn-naranja"> click aqui</a>
                    </div>
                 </div>
                 
               <?php $i++; endforeach; ?>
               </div>
            </div>
       </div>
   </div>
</section>             
                        
     <?php 
	endwhile;
get_footer();
