<?php 
/*
Template name:conocenos
*/
get_header();
while ( have_posts() ) : the_post(); ?>
<!--breadcrum-->
<div class="container">
	<div class="row">
    <ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" /></a><a href="/conocenos.php" class="first-bread"><span>Conócenos</span></a></li>
		
	</ol>
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
			<div class="col-lg-10 col-sm-9 col-md-10 spacing-bottom bottom100">
               
               <div id="slideconoce" class="mightyslider_modern_skin">
				    <!-- FRAME -->
				    <div class="frame">
				        <!-- SLIDEELEMENT -->
                        <?php 
						$sliders = get_field('slider',$post->ID);
						foreach($sliders as $sli):
							$sl = $sli['imagen'];
							
						?>
				        <div class="slide_element">
				            <!-- SLIDES -->
				            <div class="slide" data-mightyslider="cover: '<?php echo $sl['url']; ?>'">
				              <div class="mSCaption infoBlock " data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }" >
				               <h4 class="inter"><?php echo $sli['titulo'];?></h4>
				                    <?php echo $sli['contenido']; ?>
				                </div>  
				            </div>


				        <!-- END OF SLIDEELEMENT -->
				    </div>
                    	<?php endforeach;?>
				    <!-- END OF FRAME -->
				</div>
				<!-- END OF PARENT -->






			</div>
		     <div class="cheron">
				<a href="#" class="rowdown stack1"> <img src="<?php echo get_template_directory_uri() ?>/img/rowdown.png"> </a>
			</div>
               
               <div id="istack1" class="col-md-12 col-xs-12">
				<div class="row">
				<div class="texto">
                <?php $gurl = get_field("imagen_arequipa",$post->id); ?>
					<div class="expo"style="background: url(<?php echo $gurl['url']; ?>) no-repeat 0 top #f96100;">
						
						<div class="col-md-6 col-md-offset-6 expodato col-xs-12">
							<div class="iconlog"> <img src="<?php echo get_template_directory_uri() ?>/img/location-point.png"> </div>
							<?php echo get_field("contenida_arequipa",$post->ID); ?>
						</div>
					</div>
				</div>
			  </div>
			</div>
			<div class="cheron stack2">
			<a href="#" class="rowdown"> <img src="<?php echo get_template_directory_uri() ?>/img/rowdown.png"> </a>
			</div>
            
            	
                
              <div id="istack2" class="col-md-12 col-xs-12">
				<div class="row">
				<div class="presentacion-seccion">
					
					
                    <?php echo get_field("contenido_yacimiento",$post->ID);?>
				</div>

				<div class="col-md-offset-1 col-md-10">
					<?php $circles = get_field("slide_yacimiento",$post->ID);
						   foreach($circles as $cir):
						   $img = $cir['imagen'];
					?>
					 <div class="col-md-4 radiomin">
					 	<div class="thumb">
					 		<img src="<?php echo $img['url'];?>" class="img-responsive center-block">
					 	</div>
					 	<p><?php echo $cir['nombre'];?></p>
					 </div>
                     <?php endforeach; ?>
					 
					 
				</div>
			  </div>
            
            </div>  
            
            <div class="cheron">
			<a href="#" class="rowdown stack3"> <img src="<?php echo get_template_directory_uri() ?>/img/rowdown.png"> </a>
			</div>
            <p style="text-align: center; padding: 10px; margin-bottom: 60px;">Todos nuestros accionistas son parte de nuestro éxito y crecimiento.</p>
            <div id="istack3" class="col-md-12 col-xs-12 ">
                <?php $circulos = get_field('circulos',$post->ID); ?> 
                      <div class="marg80 hidden-xs">
                            <div class="col-md-4"> 
                                 <div id="circulo2" class="icircle ops2" data-size="<?php  echo $circulos[0]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[0]['fontsize']; ?>">
                                     <div  class="circulo"></div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                      <div class="creciente">
                                             <?php  echo $circulos[0]['porcentaje']."%"; ?>
                                            <span><?php echo $circulos[0]['texto'] ?></span>
                                        </div>
                                     </div>
                                     <div class="text-externo"></div>
                                </div>
                              </div>	  
                              <div class="col-md-4">
                                 <div id="circulo3" class="icircle ops1" data-size="<?php  echo $circulos[1]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[1]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                           <?php  echo $circulos[1]['porcentaje']."%"; ?>
                                            <span><?php echo $circulos[1]['texto'] ?></span>
                                        </div>
                                     </div>
                                     
                                     <div class="text-externo"></div>
                                </div>
                               
                                 <div id="circulo4" class="icircle "  data-size="<?php  echo $circulos[2]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[2]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                          <?php  echo $circulos[2]['porcentaje']."%"; ?>
                                            <span><?php echo $circulos[2]['texto'] ?></span>
                                        </div>
                                     </div>
                                     <div class="text-externo"></div>
                                </div>
                               
                              </div>  
                              
                               <div class="col-md-4">
                                  <div id="circulo1" class="icircle" data-size="<?php  echo $circulos[3]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[3]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                            <?php  echo $circulos[3]['porcentaje']."%"; ?>
                                            <span><?php  echo $circulos[3]['texto'] ?></span>
                                        </div>
                                     </div>
                                     <div class="text-externo"></div>
                                </div>
                               
                               </div>
                              
                           </div>
                    
                    
                       <div id="myCarousel" class="carousel slide hidden-lg hidden-sm hidden-md" data-ride="carousel">
                          <!-- Indicators -->
                        
                        
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <div class="item active">
                                <div id="acirculo2" class="ocircle" data-size="<?php  echo $circulos[0]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[0]['fontsize']; ?>">
                                     <div  class="circulo"></div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                      <div class="creciente">
                                             <?php  echo $circulos[0]['porcentaje']."%"; ?>
                                            <span><?php echo $circulos[0]['texto'] ?></span>
                                        </div>
                                     </div>
                                     <div class="text-externo"></div>
                                </div>
                            </div>
                        
                            <div class="item">
                                <div id="acirculo3" class="ocircle" data-size="<?php  echo $circulos[1]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[1]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                           <?php  echo $circulos[1]['porcentaje']."%"; ?>
                                            <span><?php echo $circulos[1]['texto'] ?></span>
                                        </div>
                                     </div>
                                     
                                     <div class="text-externo"></div>
                                </div>
                                
                            </div>
                        
                            <div class="item">
                             <div id="acirculo4" class="ocircle "  data-size="<?php  echo $circulos[2]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[2]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                          <?php  echo $circulos[2]['porcentaje']."%"; ?>
                                            <span><?php echo $circulos[2]['texto'] ?></span>
                                        </div>
                                     </div>
                                     <div class="text-externo"></div>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div id="acirculo1" class="ocircle" data-size="<?php  echo $circulos[3]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[3]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                            <?php  echo $circulos[3]['porcentaje']."%"; ?>
                                            <span><?php  echo $circulos[3]['texto'] ?></span>
                                        </div>
                                     </div>
                                     <div class="text-externo"></div>
                                </div>
                            
                            </div>
                          </div>
                        
                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
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
