<?php 
get_header();
setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 

?>
<div class="container hidden-xs">
	<div class="row">
    <style type="text/css">				
		.breadcrumb-container {
		  font-size:   !important;
		}
		
		.breadcrumb-container li a{
		  color:   !important;
		  font-size:   !important;
		  line-height:   !important;
		}
		
		.breadcrumb-container li .separator {
		  color:   !important;
		  font-size:   !important;
		}										
		.breadcrumb-container.theme1 li {
			margin: 0;
			padding: 0;
		}													
		.breadcrumb-container.theme1 a {
			background: ;
			display: inline-block;
			margin: 0 5px;
			padding: 5px 10px;
			text-decoration: none;
		}
</style>
<div class="breadcrumb-container theme1 breadcrumb" itemprop="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList"><ul itemtype="http://schema.org/BreadcrumbList" itemscope=""><li><span class="separator">/</span><a href="#">Media</a></li><li><span class="separator">/</span><a title="Noticias" href="/category/media/prensa/">Notas Prensa</a><span class="separator">/</span></li></ul></div></div>

</div>
<section>
<div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-2 col-sm-3 col-md-3">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('galeriaprensa');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
	    <div class="col-lg-9 col-sm-9 col-md-9 content-media">
         <!-- loop implementation-->
     <?php 	
		$args=array(
			'suppress_filters' => false,
              'post_type'      => 'media_post',
              'post_status'    => 'publish',
              'numberposts'    => -1,
			  'category_name'  => 'prensa',
              'orderby'        => 'post_date',
              'post_parent'    => 0,
              'order'          => 'DESC'
		  );
		  $prensas = get_posts($args);
		//exist get
		if(!$_GET){
		 	
		/*** inicio  ***/
					     ?>
				 		   <div class="col-md-12 barrasep">
                             	 <span>Notas Prensa</span>
                            </div>
				 	    <?php
				 
				?>  
               <div class="col-md-12">
               <?php  
				   foreach($prensas as $prensa):
					$media  = get_field('media',$prensa->ID);
					$titulo = get_field('titulo',$prensa->ID);
					$imagen = get_field('imagen',$prensa->ID);
					$fuente = get_field('fuente',$prensa->ID);
					$video  = get_field('video',$prensa->ID);
					$contenido  = get_field('contenido',$prensa->ID);
					  
					$year = get_field('year',$prensa->ID);
					$mes = get_field('mes',$prensa->ID);
				  
						// if($year==date("Y")):
							
						?>
					 <div class="col-md-4 prensa" data-year="<?php echo $year; ?>" data-mes="<?php echo $mes; ?>">
							<a href="<?php echo get_permalink($prensa->ID); ?>"><figure>
								<img src="<?php echo $imagen['url'] ?>" class="img-responsive center-block">
							</figure></a>
						   <div class="superindice">
						     <?php $isdate = date('d/m/Y', strtotime($prensa->post_date));
							  $date = str_replace("/","-",$isdate);
								echo strftime('%d %B %Y',strtotime($date));
							 
							  ?>
                           </div>
                          
							<div class="detalles">
								   <?php
                                   $content = strip_tags(get_the_title($prensa->ID)); 
								   echo mb_strimwidth($content, 0, 90, '...'); 
								  ?>
							</div>
							<div class="subindice">
								<a href="<?php echo get_permalink($prensa->ID); ?>"  class="urlenlace">Leer Nota</a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							
							</div> 
						  
					   </div>
						   <?php
						   
					    // endif;
				    endforeach;
			   ?>
               </div>	
			
             
          <?php  
            }else{
				
				 foreach($prensas as $prensa):
					$media  = get_field('media',$prensa->ID);
					$titulo = get_field('titulo',$prensa->ID);
					$imagen = get_field('imagen',$prensa->ID);
					$fuente = get_field('fuente',$prensa->ID);
					$video  = get_field('video',$prensa->ID);
					   $contenido  = get_field('contenido',$prensa->ID);
					  
					 $year = get_field('year',$prensa->ID);
					 $mes = get_field('mes',$prensa->ID);
				endforeach;
        
		   if($_GET['data']=="year"){
            ?>
                            <div class="col-md-12 barrasep">
                             	 <span><?php echo $_GET['var']; ?></span>
                            </div>
                           
				
               <div class="col-md-12">
               <?php  
				   foreach($prensas as $prensa):
					$media  = get_field('media',$prensa->ID);
					$titulo = get_field('titulo',$prensa->ID);
					$imagen = get_field('imagen',$prensa->ID);
					$fuente = get_field('fuente',$prensa->ID);
					$video  = get_field('video',$prensa->ID);
					   $contenido  = get_field('contenido',$prensa->ID);
					  
					 $year = get_field('year',$prensa->ID);
				
				  
						 if($year==$_GET['var']):
							
						?>
					 <div class="col-md-4" data-fecha="<?php echo date('F Y', strtotime($prensa->post_date)); ?>">
							<a href="<?php echo get_permalink($prensa->ID); ?>" >
                            <figure>
								<img src="<?php echo $imagen['url'] ?>" class="img-responsive center-block">
							</figure>
                            </a>
						    <div class="superindice">
						     <?php $isdate = date('d/m/Y', strtotime($prensa->post_date));
							  $date = str_replace("/","-",$isdate);
								echo strftime('%d %B %Y',strtotime($date)); ?>
                           </div>
                          
							<div class="detalles">
                              <?php
                              $content =  strip_tags(get_the_title($prensa->ID)); 
								   echo mb_strimwidth($content, 0, 80, '...'); ?>	
							</div>
							<div class="subindice">
								<a href="<?php echo get_permalink($prensa->ID); ?>"  class="urlenlace">Leer Nota</a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							
							</div> 
						  
					   </div>
						   <?php
						   
						   
					       endif;
				    endforeach;
			   ?>
               </div>	
           
          <?php    }
		  
		  
		  if($_GET['data']=="mes"){
             
             
						   ?>
                            <div class="col-md-12 barrasep">
                             	 <span><?php echo nombreFecha($_GET['var'])." ".$year; ?></span>
                            </div>
                            <?php
						
				?>  
               <div class="col-md-12">
               <?php  
				   foreach($prensas as $prensa):
					$media  = get_field('media',$prensa->ID);
					$titulo = get_field('titulo',$prensa->ID);
					$imagen = get_field('imagen',$prensa->ID);
					$fuente = get_field('fuente',$prensa->ID);
					$video  = get_field('video',$prensa->ID);
					   $contenido  = get_field('contenido',$prensa->ID);
					  
					 $yearP = get_field('year',$prensa->ID);
					 $mes = get_field('mes',$prensa->ID);
				  
						 if($yearP==$year):
							if($mes==$_GET['var']):
						?>
					 <div class="col-md-4" data-fecha="<?php echo date('F Y', strtotime($prensa->post_date)); ?>">
							<a href="<?php echo get_permalink($prensa->ID); ?>"><figure>
								<img src="<?php echo $imagen['url'] ?>" class="img-responsive center-block">
							</figure></a>
						   <div class="superindice">
						     <?php $isdate = date('d/m/Y', strtotime($prensa->post_date));
							  $date = str_replace("/","-",$isdate);
								echo strftime('%d %B %Y',strtotime($date)); ?>
                           </div>
                          
							<div class="detalles">
								   <?php
                                   $content =  strip_tags(get_the_title($prensa->ID)); 
								   echo mb_strimwidth($content, 0, 80, '...'); ?>
							</div>
							<div class="subindice">
								<a href="<?php echo get_permalink($prensa->ID); ?>"  class="urlenlace">Leer Nota</a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							
							</div> 
						  
					   </div>
						   <?php
						   
						    endif;
					     endif;
				    endforeach;
			   ?>
               </div>	
           
          <?php    }
            
       } ?>
            
            <!-- end content-->
            </div> 
        </div>
  </div>
</section> 
  <?php 
  
  function nombreFecha($idmes){
	  
	 switch($idmes){
		   case 1:
		      return "Enero";
		   break;
		   case 2:
		      return "Febrero";
		   break;
		   case 3:
		      return "Marzo";
		   break;
		   case 4:
		      return "Abril";
		   break;
		   case 5:
		      return "Mayo";
		   break;
		   case 6:
		      return "Junio";
		   break;
		   case 7:
		      return "Julio";
		   break;
		   case 8:
		      return "Agosto";
		   break;
		   
		   case 9:
		      return "Setiembre";
		   break;
		   case 10:
		      return "Octubre";
		   break;
		   case 11:
		      return "Noviembre";
		   break;
		   case 12:
		      return "diciembre";
		   break;
		 }
	  }
  get_footer();
  
  ?>
  <script>
    
	
	$(".ui-year").click(function(e){
			e.preventDefault();
			
			$(".ui-year").removeClass("active");
			
			var sel_year = $(this).data("var");
			var sel_tipo  = $(this).data("tipo");
			var meses = $(this).data("meses");
			$(".ui-mes").attr("data-year",sel_year);
			
			$(".prensa").hide();
			
			$(".prensa").each(function(index, element) {
				var p_year = $(this).data("year");
				
				if(sel_year===p_year){
					  $(this).fadeIn(350,"swing");
					}
			});
			
			$(this).addClass("active");
			$(".ames").fadeIn(350,"swing");
			$(".ui-mes").parent("li").hide();
			$(".ui-mes").parent("li").removeClass("habilitado");
			viewMonth(meses,sel_year);
		});
	
	$(".ui-mes").on("click",function(e){
			e.preventDefault();
			$(".ui-mes").removeClass("active");
			var sel_mes   = $(this).data("var");
			var sel_tipo  = $(this).data("tipo");
			var sel_year  = $(this).data("year");
			
			$(".prensa").hide();
			$(this).addClass("active");
			$(".prensa").each(function(index, element) {
				var p_mes = $(this).data("mes");
				var p_year = $(this).data("year");
				
				if(sel_year===p_year){
					
					if(sel_mes===p_mes){
						  $(this).fadeIn(350,"swing");
						}
				  }
			});
			
		});
		
	function viewMonth(data,year){
		  $.each(data,function(i,e){
			 
			  res = e.split("-");
			
			 
			  $(".ui-mes").each(function(index, element) {
                  e_mes  = $(this).data("var");
				 		  
				  if(year == res[1]){
					  
				     if(e_mes == res[0]){
					       $(this).parent("li").addClass("habilitado"); 
					  }
				  }
              });
		   });
		  
		}
  </script>