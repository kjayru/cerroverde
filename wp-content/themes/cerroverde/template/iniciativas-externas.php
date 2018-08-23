<?php 
/*
Template name:iniciativas-externas
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
				
				$iniciativas = get_field('estandar_iniciativa',$post->ID);
					foreach($iniciativas as $bl):
							 $cimgprincipal = $bl['imagen'];
					?>
				
                <div class="col-md-12 iniciativa">
                  		<div class="row">
                                <div class="col-md-12 col-xs-12 itemini">
                                    <div class="col-md-2 col-xs-5">
                                        <img src="<?php echo $cimgprincipal['url'] ?>" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-md-10 col-xs-7">
                                        <h3><?php echo $bl['titulo'] ?></h3>
                                        
                                        <p><?php echo $bl['contenido'] ?></p>
                                        <?php if($bl['enlace_externo']): ?>
                                        <a href="http://<?php echo $bl['enlace_externo'] ?>" target="_blank" class="geturl"><?php echo $bl['texto_enlace'] ?></a>
                                        <?php  endif; ?>
    									<?php if($bl['url_entrada']): ?>
                                        <!--<a href="<?php echo $bl['url_entrada'] ?>" class="leermas"><?php echo $bl['texto_enlace'] ?></a>-->
                                    	<?php  endif; ?>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                       <?php endforeach; ?>
                  </div>
                
            </div>
    </div>
   </div>
</section>                
                        
     <?php 
	endwhile;			      
get_footer();
