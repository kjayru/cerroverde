<?php 
/*
Template name:transporte
*/
get_header();
while ( have_posts() ) : the_post(); ?>
<!--breadcrum-->
<div class="container">
	<div class="row">
    <ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" /></a><a href="/operaciones" class="first-bread"><span>Operaciones</span></a></li>
		
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
						get_sidebar('operaciones');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
				<div class="col-lg-10 col-sm-9 col-md-10 interna">
                <?php  the_content();?>
                  
                  <div class="cheron">
							<a href="#" class="rowdown stack1"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
					</div>
                   <div class="row">
                   		<div class="col-md-12" id="istack1">
                        	<div class="presentacion-seccion"><img src="<?php echo get_template_directory_uri();?>/img/mineralico.png" alt="transporte"><h2 class="titulo-desarrollo"><strong>COMERCIALIZACION</strong> DE NUESTROS PRODUCTOS</h2>
                            </div>
                            <div class="col-md-12 col-xs-12  marg80">
                            	
                                
                                
                                 <?php $circulos = get_field('circulos',$post->ID); ?> 
                     				 <div class="marg80 hidden-xs">
                            <div class="col-md-4"> 
                                 <div id="tcirculo1" class="tcircle" data-size="<?php  echo $circulos[0]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[0]['fontsize']; ?>">
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
                                
                                
                                 <div id="tcirculo2" class="tcircle" data-size="<?php  echo $circulos[1]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[1]['fontsize']; ?>">
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
                              <div class="col-md-4">
                                
                               
                                 <div id="tcirculo3" class="tcircle "  data-size="<?php  echo $circulos[2]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[2]['fontsize']; ?>">
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
                                
                                
                                 <div id="tcirculo4" class="tcircle" data-size="<?php  echo $circulos[3]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[3]['fontsize']; ?>">
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
                              
                               <div class="col-md-4">
                                  <div id="tcirculo6" class="tcircle" data-size="<?php  echo $circulos[4]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[4]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                            <?php  echo $circulos[4]['porcentaje']."%"; ?>
                                            <span><?php  echo $circulos[4]['texto'] ?></span>
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
                            
                            
                            <div class="item">
                                <div id="acirculo1" class="ocircle" data-size="<?php  echo $circulos[4]['porcentaje']; ?>" data-fontsize="<?php  echo $circulos[4]['fontsize']; ?>">
                                     <div  class="circulo">
                                        
                                     </div>
                                     <div class="radio1 proimage"></div>
                                     <div class="radio2">
                                     <div class="creciente">
                                            <?php  echo $circulos[4]['porcentaje']."%"; ?>
                                            <span><?php  echo $circulos[4]['texto'] ?></span>
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
   </div>
</section>             
                        
     <?php
endwhile;	      
get_footer();
