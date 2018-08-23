<?php 
/*
Template name:abastecimiento-medio-ambiente
*/
get_header(); 
while ( have_posts() ) : the_post();?>
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
						get_sidebar('medioambiente');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10 documento">
            
             <?php $banner = get_field('banner',$post->ID);  ?>
          
          		<div class="banner">
                	<img src="<?php echo $banner['url']; ?>" alt="" class="img-responsive conter-block">
                    <span><?php echo get_field('texto_banner',$post->ID);?></span>
                </div>
                <div class="cheron">
					<a href="#" class="rowdown stack1"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			    </div>    
                <div id="contenido">
                    <?php  the_content();?>
                </div>  
                
                <div class="documentos" id="istack1">
                <ul>
                 <?php $documentos = get_field('documentos',$post->ID); 
				   
				 ?>
                	
                     <?php   foreach($documentos as $doc): 
					  $archivo = $doc['documento'];
					 ?>
                     <li class="<?php echo $doc['tipo_de_documento']; ?>">
                     	<a href="<?php echo $archivo['url']; ?>"  class="doc_url"><?php echo $doc['titulo']; ?></a>
                     </li>
                     <?php endforeach; ?>
                    
                    </ul>
                
                </div>
                
            </div>
    </div>
   </div>
</section>             
                        
     <?php 
	 endwhile;
				      
get_footer();
?>
<script>
	$(".Compra").hide();
	
	$(".docside a").click(function(e){
		e.preventDefault();
		$(".Compra").hide();
		$(".Contrato").hide();
		$(".docside a").removeClass("active");
		var tipo = $(this).data("tipo");
		   if(tipo=="contrato"){
			   $(".Contrato").show();  
			}
			if(tipo=="compra"){
			   $(".Compra").show();  
			}
		 $(this).addClass("active");
		});
</script>
