<?php 
/*
Template name:premios-obtenidos
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
				
					$premios = get_field('premios_obtenidos',$post->ID);
					foreach($premios as $bl):
							 $imgs = $bl['imagen'];
					?>
				
                
                <div class="col-md-12 iniciativa">
                
                  		<div class="row">
                        	<div class="col-md-12 col-xs-12 itemini">
                            	<div class="col-md-2 col-xs-5">
                                	<div class="box-p">
                                    	<img src="<?php echo $imgs['url']; ?>" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-10 col-xs-7">
                                	<h3><?php echo $bl['titulo']; ?></h3>
                                    <h4><?php echo $bl['subtitulo']; ?></h4>
                                	<p><?php echo $bl['contenido']; ?></p>
									<!--<a href="#" class="leermas">Ver mas</a>-->
									<!--<a href="<?php echo $bl['enlace_entrada']; ?>" class="leermas">Leer mas</a>-->
                                    <!--<a href="<?php echo $bl['enlace_proyecto']; ?>" class="leermas">ver Proyecto</a>-->
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
