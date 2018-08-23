<?php 
/*
Template name:desarrollo
*/
get_header(); ?>
<!--breadcrum-->
<div class="container">
	<div class="row">
    <ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" /></a><a href="/conocenos.php" class="first-bread"><span>Desarrollo sostenible</span></a></li>
		
	</ol>
  <?php echo do_shortcode('[breadcrumb]'); ?>
   </div>
</div>

<section id="quienessomos">
	<div class="container">
	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-2 col-sm-3 col-md-2">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('desarrollo');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10">
			 

			<div id="slideconoce" class="mightyslider_modern_skin">
				    <!-- FRAME -->
				    <div class="frame">
				        <!-- SLIDEELEMENT -->
				        <div class="slide_element">
				            <!-- SLIDES -->
				            <div class="slide" data-mightyslider="cover: '<?php echo get_template_directory_uri(); ?>/img/conocenos-slide1.png'">
				              <div class="mSCaption infoBlock " data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }" >
				               <h4>Somos <span>la minera productora de cobre</span>
				más importante del Perú</h4>
				                    <p>Somos filial de Freeport McMoRan Inc., el mayor productor mundial de cobre 
				y molibdeno, y un importante productor de oro, petróleo y gas natural. 
				Nuestras operaciones cumplen con los más altos estándares de seguridad, 
				calidad, responsabilidad social y respeto al medio ambiente</p> 
				                </div>  
				            </div>


				            <div class="slide" data-mightyslider="cover: '<?php echo get_template_directory_uri(); ?>/img/conocenos-slide1.png'"> 

				               <div class="mSCaption infoBlock " data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }">
				              <h4>Somos <span>la minera productora de cobre</span>
				más importante del Perú</h4>
				                    <p>Somos filial de Freeport McMoRan Inc., el mayor productor mundial de cobre 
				y molibdeno, y un importante productor de oro, petróleo y gas natural. 
				Nuestras operaciones cumplen con los más altos estándares de seguridad, 
				calidad, responsabilidad social y respeto al medio ambiente</p> 
				            </div>
				           </div>


				            <div class="slide" data-mightyslider="cover: '<?php echo get_template_directory_uri(); ?>/img/conocenos-slide1.png'">
				                <div class="mSCaption infoBlock " data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }">
				              <h4>Somos <span>la minera productora de cobre</span>
				más importante del Perú</h4>
				                    <p>Somos filial de Freeport McMoRan Inc., el mayor productor mundial de cobre 
				y molibdeno, y un importante productor de oro, petróleo y gas natural. 
				Nuestras operaciones cumplen con los más altos estándares de seguridad, 
				calidad, responsabilidad social y respeto al medio ambiente</p>  
				            </div>
				        </div>

				        <div class="slide" data-mightyslider="cover: '<?php echo get_template_directory_uri(); ?>/img/conocenos-slide1.png'">
				                  <div class="mSCaption infoBlock " data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }">
				               <h4>Somos <span>la minera productora de cobre</span>
				más importante del Perú</h4>
				                    <p>Somos filial de Freeport McMoRan Inc., el mayor productor mundial de cobre 
				y molibdeno, y un importante productor de oro, petróleo y gas natural. 
				Nuestras operaciones cumplen con los más altos estándares de seguridad, 
				calidad, responsabilidad social y respeto al medio ambiente</p> 
				            </div>
				            <!-- END OF SLIDES -->
				        </div>
				        <!-- END OF SLIDEELEMENT -->
				    </div>
				    <!-- END OF FRAME -->
				</div>
				<!-- END OF PARENT -->






			</div>
			<div class="cheron">
				<a href="#" class="rowdown stack1"> <img src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			</div>
			
            
            <div class="especificado col-md-12" id="istack1">
                    
                    <div class="col-md-5 col-sm-5 ileft1">
                        <div class="col-md-10"><p>Ahora te contamos sobre nuestro proyecto de 
        Circulo virtuosos del agua.</p>
                        </div>
                        <div class="col-md-2">
                        <a href="#" class="radiobots"><img src="<?php echo get_template_directory_uri(); ?>/img/radioright.png"/></a>
                        </div>
                    </div>
                      <div class=" col-md-7 col-sm-7 iright" >
                        
                    </div>
                  
            </div>
		  </div>
	    </div>
    </div>
</section>
                   
                        
     <?php 
						
				      
get_footer();
