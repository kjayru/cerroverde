<?php 
/*
Template name:abastecimiento-page
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
	<div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			
    <!-- CONTENT --> 
    	<div class="col-lg-12 col-sm-12 col-md-12">
             <div class="contenido">    
			  <div class="col-md-10  col-lg-8  col-sm-10  blq-abastecimiento <?php  if($i==0){ echo  "col-md-offset-1 col-lg-offset-2 col-sm-offset-1"; }  ?>" style="margin-top:40px;">
            	
             <?php 
			   $i = 0;
			    $bloques = get_field('bloque',$post->ID);
					foreach($bloques as $bloque):
				    $bl_imagen = $bloque['imagen'];
			   ?>
            		<div class="col-md-6">
                    	<div class="ab-blq">
                            <figcaption style="background:url(<?php echo $bl_imagen['url']; ?>) no-repeat center center; background-size:cover;"></figcaption>
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
   </div>
</section>             
                        
     <?php 
	 endwhile;
				      
get_footer();
?>

