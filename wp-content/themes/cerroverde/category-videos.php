<?php 
get_header();

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
<div class="breadcrumb-container theme1 breadcrumb" itemprop="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList"><ul itemtype="http://schema.org/BreadcrumbList" itemscope=""><li><span class="separator">/</span><a href="#">Media</a></li><li><span class="separator">/</span><a title="Noticias" href="http://devcerroverde.mediacontacts-app.com/category/media/videos/">Videos</a><span class="separator">/</span></li></ul></div></div>
</div>
<section>
  <div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-3 col-sm-3 col-md-3">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('videos');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
	        <div class="col-lg-9 col-sm-9 col-md-9">
         <!-- loop implementation-->
     <?php 	
		$args=array(
			'suppress_filters' => false,
              'post_type'=>'media',
              'post_status' => 'publish',
              'numberposts'=>'50',
			   'category_name'=>'videos',
              'orderby'=>'post_date',
              'post_parent'=>0,
              'order'=>'DESC'
		  );
		  $prensas = get_posts($args);
		//exist get
		if(!$_GET){
		 	
		/*** inicio  ***/
		     foreach($prensas as $prensa2): 
			     $year = get_field('year',$prensa2->ID);
				 $mes2 = get_field('mes',$prensa2->ID);		
				 if($year==date("Y")):
				     if($mes2==date("n")):
						   ?>
                            <div class="col-md-12 barrasep">
                             	 <span><?php echo nombreFecha($mes2)." ".$year; ?></span>
                            </div>
                            <?php
					  endif;
				 endif;
				endforeach; 
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
				  
						 if($year==date("Y")):
							if($mes==date('n')):
						?>
					 <div class="col-md-4" data-fecha="<?php echo date('F Y', strtotime($prensa->post_date)); ?>">
							<a href="#" data-dato="<?php echo $video; ?>" data-toggle="modal" data-target="#videomodal" data-uri="<?php echo get_permalink($prensa->ID); ?>">
                            <figure>
								<img src="https://img.youtube.com/vi/<?php echo $video; ?>/hqdefault.jpg" class="img-responsive center-block">
							</figure></a>
						   <div class="superindice">
						     <?php echo date('j F Y', strtotime($prensa->post_date)); ?>
                           </div>
                          
							<div class="detalles">
								<?php echo $contenido; ?>
							</div>
							<div class="subindice">
								<a href="http://<?php echo $fuente; ?>" target="_blank" class="urlenlace"><?php echo $fuente; ?></a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							<a href="#" class="sic redirect" data-id="<?php echo $prensa->ID;?>"><span class="glyphicon glyphicon-share-alt"></span>0</a>
							</div> 
						  
					   </div>
						   <?php
						   
						    endif;
					     endif;
				    endforeach;
			   ?>
               </div>	
			 <?php
            foreach($prensas as $prensa2): 
			     $year = get_field('year',$prensa2->ID);
				 $mes2 = get_field('mes',$prensa2->ID);		
				 if($year==date("Y")):
				     if($mes2==date("n")-1):
						   ?>
                            <div class="col-md-12 barrasep">
                             	 <span><?php echo nombreFecha($mes2)." ".$year; ?></span>
                            </div>
                            <?php
					  endif;
				 endif;
				endforeach; 
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
				  
						 if($year==date("Y")):
							if($mes==date("n")-1):
						?>
					 <div class="col-md-4" data-fecha="<?php echo date('F Y', strtotime($prensa->post_date)); ?>">
							<a href="#" data-dato="<?php echo $video; ?>" data-toggle="modal" data-target="#videomodal" data-uri="<?php echo get_permalink($prensa->ID); ?>">
                            <figure>
								<img src="https://img.youtube.com/vi/<?php echo $video; ?>/hqdefault.jpg" class="img-responsive center-block">
							</figure></a>
						   <div class="superindice">
						     <?php echo date('j F Y', strtotime($prensa->post_date)); ?>
                           </div>
                          
							<div class="detalles">
								<?php echo $contenido; ?>
							</div>
							<div class="subindice">
								<a href="http://<?php echo $fuente; ?>" target="_blank" class="urlenlace"><?php echo $fuente; ?></a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							<a href="#" class="sic redirect" data-id="<?php echo $prensa->ID;?>"><span class="glyphicon glyphicon-share-alt"></span>0</a>
							</div> 
						  
					   </div>
						   <?php
						   
						    endif;
					     endif;
				    endforeach;
			   ?>
               </div>	    
            
          <?php  
            }else{
        
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
							<a href="#" data-dato="<?php echo $video; ?>" data-toggle="modal" data-target="#videomodal" data-uri="<?php echo get_permalink($prensa->ID); ?>">
                            <figure>
								<img src="https://img.youtube.com/vi/<?php echo $video; ?>/hqdefault.jpg" class="img-responsive center-block">
							</figure></a>
						   <div class="superindice">
						     <?php echo date('j F Y', strtotime($prensa->post_date)); ?>
                           </div>
                          
							<div class="detalles">
								<?php echo $descripcion; ?>
							</div>
							<div class="subindice">
								<a href="http://<?php echo $fuente; ?>" target="_blank" class="urlenlace"><?php echo $fuente; ?></a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							<a href="#" class="sic redirect" data-id="<?php echo $prensa->ID;?>"><span class="glyphicon glyphicon-share-alt"></span>0</a>
							</div> 
						  
					   </div>
						   <?php
						   
						   
					     endif;
				    endforeach;
			   ?>
               </div>	
           
          <?php    }
		  
		  
		  if($_GET['data']=="mes"){
           
              foreach($prensas as $prensa2): 
			     $year = get_field('year',$prensa2->ID);
				 $mes2 = get_field('mes',$prensa2->ID);		
				 if($year==date("Y")):
				     if($mes2==$_GET['var']):
						   ?>
                            <div class="col-md-12 barrasep">
                             	 <span><?php echo nombreFecha($mes2)." ".$year; ?></span>
                            </div>
                            <?php
					  endif;
				 endif;
				endforeach; 
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
				  
						 if($year==date("Y")):
							if($mes==$_GET['var']):
						?>
					 <div class="col-md-4" data-fecha="<?php echo date('F Y', strtotime($prensa->post_date)); ?>">
							<a href="#" data-dato="<?php echo $video; ?>" data-toggle="modal" data-target="#videomodal" data-uri="<?php echo get_permalink($prensa->ID); ?>">
                            <figure>
								<img src="https://img.youtube.com/vi/<?php echo $video; ?>/hqdefault.jpg" class="img-responsive center-block">
							</figure></a>
						   <div class="superindice">
						     <?php echo date('j F Y', strtotime($prensa->post_date)); ?>
                           </div>
                          
							<div class="detalles">
								<?php echo $descripcion; ?>
							</div>
							<div class="subindice">
								<a href="http://<?php echo $fuente; ?>" target="_blank" class="urlenlace"><?php echo $fuente; ?></a>
							</div>
							<hr>
							<div class="post-foot">
							<a href="#" class="sic views"><span class="glyphicon glyphicon-eye-open"></span><?php echo getPostViews($prensa->ID); ?></a>
							<a href="#" class="sic redirect" data-id="<?php echo $prensa->ID;?>"><span class="glyphicon glyphicon-share-alt"></span>0</a>
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