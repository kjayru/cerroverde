<?php 
/*
Template name:mina
*/
get_header(); 
while ( have_posts() ) : the_post();?>
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
						get_sidebar('operaciones');
						?>
					
				    </div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10 interna">
                <?php  the_content();?>
                
                <div class="row">
                    <div class="col-md-12 marg80 margtop80">
                     <?php $metodos = get_field("proceso",$post->ID);?>
                        <section class="timelines">
                         
                             <div class="timeline-container timeline-theme-1">
                               <div class="timeline js-timeline">
                             
								  <?php foreach($metodos as $metodo):
                                        $img = $metodo['imagen'];
                                  ?>
                                    <div data-time="<?php echo $metodo['item']; ?>">
                                      <div class="timeline-visual">
                                         <img src="<?php echo $img['url'];  ?>" class="img-responsive center-block">
                                       </div>
                                    </div>
                                   <?php endforeach; ?>
                            
                                </div>
                            </div>
                        
                           
                           
                      </section>
   
                          
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-12 op-title">
                    	<div class="iconmino">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/iconmina.png" class="center-block">
                        </div>
                        <div class="textgenerico" style="color:#ce6a2b">Tratamiento del <strong>material extraido</strong></div>
                    </div>
                    <div class="col-md-12 marg80">
                    	
                    	 <!-- Swiper -->
                         <?php $tratamientos = get_field("tratamiento",$post->ID);
						 	
						 ?>
                                <div class="slide-tratamiento">
                                    <div class="swiper-wrapper">
                                    <?php foreach($tratamientos as $tratamiento):
										$gimg = $tratamiento['imagen'];
									?>
                                        <div class="swiper-slide">
                                        	<div class="col-md-offset-1 col-md-5 col-xs-6">
                                            	<img src="<?php echo $gimg['url']; ?>" class="img-responsive">
                                            </div>
                                            <div class="col-md-5 col-xs-12 describe">
                                            	<p> <?php echo $tratamiento['descripcion'];?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>     
                                       
                                     
                                    </div>
                                   
                                    <div class=" opright"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                                    <div class=" opleft">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                                </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-12 bloque-lista marg80">
                       
                            <h2>Datos importantes</h2>
                            <?php $listas = get_field("datos",$post->ID); ?>
                            <ul class="lista-cerro">
                                <?php foreach($listas as $lista ):?>
                                <li><?php echo $lista['lista']; ?></li>
                         		<?php endforeach; ?>
                            </ul>
                            
                        </div>
                    </div>
            </div>
       </div>
   </div>
</section>             
                        
     <?php 
	endwhile;			      
get_footer();
