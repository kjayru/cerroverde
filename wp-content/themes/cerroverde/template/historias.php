<?php 
/*
Template name:historias
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

<section id="quienessomos" class="tushistorias">
	<div class="container">
		
		<div class="row">
        <!--sidebar-->
			<div class="col-lg-2 col-md-2">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('conocenos');
						?>
					
				</div>
                </div>
			</div>
        <!-- end sidebar-->
        <!--star content -->
			<div class="col-lg-10 col-md-10">
            
            <?php  the_content(); ?>
                 
              	<div class="row historias">
					
                    <!-- loop-->
                    <?php
					$i = 1;
					$j = 1;
					 $arg=array(
						  'suppress_filters' => false,
						  'post_type'=>'historias_panel',
						  'post_status' => 'publish',
						  'numberposts'=>'100',
						  'orderby'=>'menu_order',
						  'post_parent'=>0,
						  'order' => 'DESC'
						);
							$historias = get_posts($arg);
								 
						   foreach ($historias as $historia): 
						  
						   $contenedor = get_field("historia",$historia->ID);
						  
						     foreach($contenedor as $cont):
							 $cimgprincipal = $cont['imagen_principal'];
							 $cimgbox =  $cont['imagen_box'];
							 
				    ?>
                    <div class="col-lg-4 col-md-4 col-xs-12 thumb" >
                    	<div class="contenedor" style="background:url('<?php echo $cimgbox['url']; ?>') no-repeat; background-size:cover;">
                        <a class="thumbnail" href="#" id="bthum-<?php echo $i; ?>" data-describe="<?php echo $cont['descripcion']; ?>" data-imagen="<?php echo $cimgprincipal['url']; ?>">
                            
                            <h5><?php echo $cont['fechas'];?></h5>
                            <p><?php echo $cont['titulo']; ?></p>
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
                  
						endforeach;
					endforeach;
					
					
					?>
                     <!-- loop-->
                  </div>
			</div>
        <!-- end content-->
		</div>
	</div>
</section>
       
                        
                        
     <?php 
			
	endwhile;					      
get_footer();
