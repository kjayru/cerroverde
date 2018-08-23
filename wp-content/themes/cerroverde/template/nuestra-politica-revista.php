<?php 
/*
Template name:nuestra-politica-revista
*/
get_header(); ?>
<!--breadcrum-->
<div class="container">
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
			<div class="col-lg-10 col-sm-9 col-md-10 boletines">
            	<div class="col-md-12">
                
                 
                		<div class="col-md-4">
                            <a href="#" class="catboletin" >
                            
                                <div class="inews" style="background:url('<?php echo get_template_directory_uri()?>/img/revista1.png') no-repeat center 0px; background-size:cover;">
                                  <h3>Somos Uchumayo</h3>
                                  <hr>
                                </div>
                                <div class="sombra">
                                   <h3>Somos Uchumayo</h3>
                                   <hr>
                                </div>
                            </a>
                        
                        </div>
                        
                        <div class="col-md-4">
                            <a href="#" class="catboletin">
                            
                                <div class="inews" style="background:url('<?php echo get_template_directory_uri()?>/img/2.png') no-repeat center 0px; background-size:cover;">
                                  <h3>Somos Yarabamba</h3>
                                  <hr>
                                </div>
                                <div class="sombra">
                                   <h3>Somos Yarabamba</h3>
                                   <hr>
                                </div>
                            </a>
                        
                        </div>
                        
                        <div class="col-md-4">
                            <a href="#" class="catboletin" >
                            
                                <div class="inews" style="background:url('<?php echo get_template_directory_uri()?>/img/003.png') no-repeat center 0px; background-size:cover;">
                                  <h3>Boletin "orgullo de que nos une"</h3>
                                  <hr>
                                </div>
                                <div class="sombra">
                                   <h3>Boletin "orgullo de que nos une"</h3>
                                   <hr>
                                </div>
                            </a>
                        
                        </div>
                       <?php 
					   
					   
					   ?> 
                        
                </div>
               
                
            </div>
    </div>
   </div>
</section>             
                        
    <?php
				      
get_footer();
