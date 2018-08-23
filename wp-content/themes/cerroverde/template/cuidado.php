<?php 
/*
Template name:cuidado-del-medio-ambiente
*/
get_header();
while ( have_posts() ) : the_post(); ?>
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
                <div class="content">
                <?php  the_content();?>
                </div>
               <div class="bloque1">
               
               </div> 
                 
               <!--desktop-->
               <div class="thumbnail thumb-naranja hidden-xs">
                   
                     <div class="image-container thumb-left">
						 <?php $img_mitigacion =  get_field('imagen_mitigacion',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_mitigacion['url']; ?>" alt="preview">
                    </div>
                     <div class="caption thumb-right">
                             <h1>MITIGACION DEL POLVO</h1>
                             <p><?php echo get_field('mitigacion_de_polvo',$post->ID); ?> </p>
                    </div>
               </div>
               
               
               <div class="thumbnail thumb-white hidden-xs">
                    <div class="caption thumb-left">
                             <h1>GESTIÓN DEL AGUA</h1>
                             <p><?php echo get_field('gestion_del_agua',$post->ID); ?></p>
                    </div>
                     <div class="image-container thumb-right">
						 <?php $img_gestion =  get_field('imagen_gestion',$post->ID);?>
                        <img src="<?php echo $img_gestion['url']; ?>" alt="preview">
                    </div>
                    
               </div>
               
               
               
               <div class="thumbnail thumb-green hidden-xs">
                   
                     <div class="image-container thumb-left">
                        <?php $img_monitor =  get_field('imagen_monitoreo',$post->ID);?>
                        <img src="<?php echo $img_monitor['url']; ?>" alt="preview">
                    </div>
                     <div class="caption thumb-right">
                             <h1>MONITOREOS AMBIENTALES PARTICIPATIVOS</h1>
                             <p><?php echo get_field('monitoreos_ambientales',$post->ID); ?></p>
                    </div>
               </div>
               
               
               
               <div class="thumbnail thumb-white hidden-xs">
                    <div class="caption thumb-left">
                             <h1>MANEJO DE RESIDUOS</h1>
                             <p><?php echo get_field('manejo_de_residuos',$post->ID); ?></p>
                    </div>
                     <div class="image-container thumb-right">
                        <?php $img_manejo =  get_field('imagen_manejo',$post->ID);?>
                        <img src="<?php echo $img_manejo['url']; ?>" alt="preview">
                    </div>
                    
               </div>
				
				 <div class="thumbnail thumb-naranja hidden-xs">
                   
                     <div class="image-container thumb-left">
						 <?php $img_diversidad =  get_field('imagen_diversidad',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_diversidad['url']; ?>" alt="preview">
                    </div>
                     <div class="caption thumb-right">
                             <h1>CUIDADO DE LA DIVERSIDAD</h1>
                             <p><?php echo get_field('cuidado_diversidad',$post->ID); ?> </p>
                    </div>
               </div>
				
               <!-- mobile-->
				
				
			   <div class="row thumbmov thumb-naranja hidden-md hidden-sm hidden-lg">                                      
                    <div class=" caption col-xs-12">
                             <h1>MITIGACION DEL POLVO</h1>
                             <p><?php echo get_field('mitigacion_de_polvo',$post->ID); ?> </p>
                    </div>
					<div class="col-xs-12">
						 <?php $img_mitigacion =  get_field('imagen_mitigacion',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_mitigacion['url']; ?>" class="img-responsive" alt="preview">
                    </div>
               </div>
				
				
			   <div class="row thumbmov thumb-white hidden-md hidden-sm hidden-lg">                                      
                    <div class=" caption col-xs-12">
                             <h1>GESTIÓN DEL AGUA</h1>
                             <p><?php echo get_field('gestion_del_agua',$post->ID); ?> </p>
                    </div>
					<div class="col-xs-12">
						 <?php $img_gestion =  get_field('imagen_gestion',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_gestion['url']; ?>" class="img-responsive" alt="preview">
                    </div>
               </div>
				
				
				
				<div class="row thumbmov thumb-green hidden-md hidden-sm hidden-lg">                                      
                    <div class=" caption col-xs-12">
                             <h1>MONITOREOS AMBIENTALES PARTICIPATIVOS</h1>
                             <p><?php echo get_field('monitoreos_ambientales',$post->ID); ?> </p>
                    </div>
					<div class="col-xs-12">
						 <?php $img_monitoreo =  get_field('imagen_monitoreo',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_monitoreo['url']; ?>" class="img-responsive" alt="preview">
                    </div>
               </div>
				
				
				
				<div class="row thumbmov thumb-white hidden-md hidden-sm hidden-lg">                                      
                    <div class=" caption col-xs-12">
                             <h1>MANEJO DE RESIDUOS</h1>
                             <p><?php echo get_field('manejo_de_residuos',$post->ID); ?> </p>
                    </div>
					<div class="col-xs-12">
						 <?php $img_manejo =  get_field('imagen_manejo',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_manejo['url']; ?>" class="img-responsive" alt="preview">
                    </div>
               </div>
				
				 <div class="row thumbmov thumb-naranja hidden-md hidden-sm hidden-lg">                                      
                    <div class=" caption col-xs-12">
                             <h1>CUIDADO DE LA DIVERSIDAD</h1>
                             <p><?php echo get_field('cuidado_diversidad',$post->ID); ?> </p>
                    </div>
					<div class="col-xs-12">
						 <?php $img_diversidad =  get_field('imagen_diversidad',$post->ID);
						 
						 ?>
                        <img src="<?php echo $img_diversidad['url']; ?>" class="img-responsive" alt="preview">
                    </div>
               </div>
				
				
			<!--	
              <div id="biodiversidad">
                   
                        <div class="col-md-12">
                                <div class="col-ico center-block">
                                    <img src="<?php echo get_template_directory_uri();?>/img/icobio.png" alt="">
                                </div>
                                <div class="getitulo">
                                        <h2>Cuidado de la biodiversidad</h2>
                                </div>
                                
                        </div>
				<div class="col-md-12">
   <p>Algunas especies de animales en peligro o amenazadas no solo se encuentran en zonas cercanas a la mina, sino incluso dentro de nuestras concesiones. Para proteger la biodiversidad de la zona, contamos con programas de protección y conservación de estas especies, que están incluidas dentro del Plan de Gestión de la Biodiversidad de Cerro Verde. Estas medidas incluyen la gestión de riesgos para la flora y fauna, la protección del hábitat de estas especies, la gestión de sus recursos alimenticios, la propagación de especies de plantas silvestres en nuestro vivero y conteos para determinar fluctuaciones en el número de individuos. Nuestra gestión de la Biodiversidad ha sido reconocida tanto nacional como internacionalmente.</p>                     	
                            
 <div class="mightyslider_carouselSimple_skin clearfix" id="simple">
   
    <ul class="mSPages">
    </ul>
   
    <div class="frame">
        
        <ul class="slide_element">
            
			
		<?php $sliders = get_field('cuidado_de_la_biodiversidad',$post->ID);
			
			foreach($sliders as $slide):
			$img = $slide['imagen']; 
			?>
            <li class="slide" data-mightyslider="cover:'<?php echo $img['url']; ?>'">
                <div class="details">
                    <strong><?php echo $slide['titulo']; ?></strong>
                     <b> <?php echo $slide['subtitulo']; ?></b>
                </div>
                <div class="backface">
               		 <div class="detalles2">
                    	  <strong><?php echo $slide['titulo']; ?></strong><br>
                    	 <b> <?php echo $slide['subtitulo']; ?></b>
                    </div>
                	<p>
						<?php echo $slide['descripcion']; ?>
					</p>
                </div>
            </li>
           
            <?php endforeach; ?>
           
            
             
            
                                                                                                                                   
        </ul>
    </div>
</div>


                            
                        </div>
                   
              </div> --> 
            </div>
    </div>
   </div>
  
	    
</section>  
     
                        
     <?php 
	
		endwhile;		      
get_footer();
