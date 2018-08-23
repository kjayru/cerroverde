<?php 
/*
Template name:voluntariados-corporativos
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
			<div class=" col-lg-2 col-sm-3 col-md-2">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('voluntariado');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			 <div class="col-lg-10 col-sm-9 col-md-10 contenidogeneral">
            <div class="banner">
                <?php $banner =  get_field("banner",$post->ID); ?>
                <img src="<?php echo $banner['url'];?>" alt="" class="img-responsive center-block">
            </div>
             <div class="cheron">
							<a href="#" class="rowdown stack1"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			</div>
            <div id="istack1">
				<?php echo get_field("cuerpo_de_texto",$post->ID); ?>
            </div>
            
            <div class="galeria historias row">
            	<?php
				$galeria = get_field("galeria",$post->ID);
				
				 $i = 1;
				 $j = 1;
				foreach($galeria as $gal):
					$galimg        = $gal['imagen_box'];
					$galimg_gen    = $gal['imagen_general'];
					$texto_box     = $gal['texto_box'];
					$texto_general = $gal['texto_general'];
					$fecha 		   = $gal['fecha'];
					//inicio loop ?>
					 <div class="col-lg-4 col-md-4 col-xs-12 thumb" >
                    	<div class="contenedor" style="background:url('<?php echo $galimg['url']; ?>') no-repeat; background-size:cover;">
                        <a class="thumbnail" href="#" id="bthum-<?php echo $i; ?>" data-describe="<?php echo $texto_general; ?>" data-imagen="<?php echo $galimg_gen['url']; ?>">
                            
                            <h5><?php echo $fecha;?></h5>
                            <p><?php echo $texto_box; ?></p>
                        </a>
                        </div>
                    </div><?php
                    if ($i%3==0){
						if($i>0){
					?>
                     <div class="col-md-12">
                    	<div class="mainhistory togglemain-out" id="num-<?php echo $j; ?>">
                        	<a class="cerrarblock" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/btn-cancel.png"/></a>
                            <p class="descripcion">Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado.
Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p>
                            <div class="fotohistory">
                             <img src="<?php echo get_template_directory_uri(); ?>/img/tajo.png" class="img-reponsive"/>
                            </div>
                    </div>
                    </div>
						<?php
						$j++;	
							}
						}
					   $i++;
					//end loop
					
				endforeach;
				 ?>
            </div>
        </div>
    </div>
   </div>
</section>              
                        
     <?php 
	endwhile;			      
get_footer();
