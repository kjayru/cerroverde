<?php 
/*
Template name:infraestructura
*/
get_header(); 
while ( have_posts() ) : the_post(); ?>
<!--breadcrum-->
<div class="container hidden-xs">
	<div class="row">
     <?php echo do_shortcode('[breadcrumb]'); ?>
   </div>
</div>

<section>
	<div class="container pad60">
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
            <div id="slidecirculo" class="mightyslider_modern_skin">
				    <div class="frame3">
				        <div class="slide_element">
				            <!-- SLIDES -->
				   <?php  
					$bloques = get_field('slider',$post->ID);
					$img = get_field('imagen_arequipa',$post->ID);
					
					foreach($bloques as $bl):
							 $imgsli = $bl['imagen'];
					?>

				            <div class="slide" data-mightyslider="cover:'<?php echo $imgsli['url'];?>'">
				                <div class="mSCaption infoBlock" data-msanimation="{
				                    speed: 700,
				                    easing: 'easeOutQuint',
				                    style: {
				                        left: 30,
				                        opacity: 1
				                    }
				                }">
				             <h4 class="inter"><?php echo $bl['titulo'];?></h4>
				            </div>
				        </div>
					<?php 
					endforeach;
					?>
				       
				        <!-- END OF SLIDEELEMENT -->
				    </div>
				</div>
			</div>
	
			<div class="cheron">
							<a href="#" class="rowdown stack1"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			</div>
            <div id="istack1">
            	<?php the_content(); ?>
            </div>
                <!--galeria-->
                
                 <div class="col-md-12 grupos">
                  <?php 
				  $galerias = get_field('galeria',$post->ID);
				  foreach($galerias as $gal):
							 $galimg = $gal['imagenes'];
							 $galvid = $gal['video'];
					 
							$eval = $gal['tipo_de_objeto'];
							if($eval=="imagen"){
				    ?>
                	<div class="col-md-4 enlista op1">
                      <div class="holder" style="background:url(<?php echo $galimg[0]['imagen']['url']; ?>) no-repeat center center; background-size:cover;">
                        
                      </div>
                      <div class="info">
          <a href="<?php echo $galimg[0]['imagen']['url'];?>" class="alight" data-toggle="lightbox" data-title="<?php echo $galimg[0]['titulo'];?>" data-footer="<?php echo $galimg[0]['descripcion'];?>" data-gallery="hidden-images" data-width="800">
    		 <span class="glyphicon glyphicon-search"></span><?php echo $galimg[0]['titulo']; ?>
		  </a>
                      </div>
                      <!--hidden elements-->
                      <?php $i = 0; foreach($galimg as $fimg){
						 
						 	if($i!=0){
						  ?>
                      
                      <div data-toggle="lightbox" data-gallery="hidden-images"  data-remote="<?php echo $fimg['imagen']['url']; ?>" data-title="<?php echo $fimg['titulo']; ?>"  data-footer="<?php echo $fimg['descripcion']; ?>" data-width="800"></div>
					   <?php  }
					    $i++;}?>
                    <!--end hidden elements-->
                    </div>
                    <?php }else{ ?>
					 <div class="col-md-4 enlista op1">
                      <div class="holder" style="background:url('http://img.youtube.com/vi/<?php echo  $galvid; ?>/0.jpg') no-repeat center; background-size:cover; width: 100%;min-height: 301px;">

                      </div>
                      <div class="info">
                      	<a href="https://youtu.be/<?php echo  $galvid; ?>" class="play" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/play.png"/></a>
                      </div>
                    </div>
					<?php	}
					endforeach; ?>
                 
                </div>
                
                
                 <!-- block-->
                <!-- block-->
           <div class="especificado col-md-12" style="background: url(<?php echo $imagen['url'];?>) no-repeat right -37px;">
    		
       		<div class="col-md-5 col-sm-5 col-xs-12 ileft1">
            	<div class="col-md-10 col-xs-8"><p><?php echo get_field("texto_bloque_verde",$post->ID); ?></p>
                </div>
                <div class="col-md-2 col-xs-4">
                <a href="<?php echo get_field("enlace_bloque_verde",$post->ID); ?>" class="radiobots">
                <?php $imagen =get_field("imagen_bloque_verde",$post->ID); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/radioright.png"/></a>
                </div>
            </div>
        	<div class=" col-md-7 col-sm-7 col-xs-12 iright" style="background: url(<?php echo $imagen['url'];?>) no-repeat 6px -37px;" >
            	
            </div>
          
    </div>
            <!--end-->
            </div>
    </div>
   </div>
</section>             
                        
     <?php 
	endwhile;
				      
get_footer();
