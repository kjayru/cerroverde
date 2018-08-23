<?php 
/*
Template name:nuestra-politica
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
			<div class="col-lg-10 col-sm-9 col-md-10 bottom100">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
				<?php
				  the_content();		 
				?> 
                  </div>
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			        
                     <div class=" politicas">           
					<?php  
					$bloques = get_field('bloques',$post->ID);
					foreach($bloques as $bl):
							 $cimgprincipal = $bl['imagen'];
							 $archivo = $bl['archivo_pdf'];		
					?>
                    <div class=" col-md-4 col-sm-6 col-xs-12 polis" >
                       <div class="row" style="background:url('<?php echo $cimgprincipal['url']; ?>') no-repeat 0px 0px; background-size:cover;"> 
                            <a class="referencia" href="<?php echo $archivo['url']; ?>" target="_blank">
                                <h5><?php echo $bl['titulo']; ?></h5>
                            </a>
                       </div>
                      
                    </div>                 
                   <?php endforeach; ?>
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
