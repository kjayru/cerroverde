<?php 
/*
Template name:contribuciones-economicas
*/
get_header();
while ( have_posts() ) : the_post(); ?>
<!--breadcrum-->
<div class="container">
	<div class="row">
    <ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" /></a><a href="/desarrollo" class="first-bread"><span>Contribuciones Económicas</span></a></li>
		
	</ol>
   </div>
</div>

<section>
	<div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			
    <!-- CONTENT -->     
			<div class="col-lg-12 col-sm-12 col-md-12">
            <?php
				
					the_content();
				

				?>
            </div>
    </div>
   </div>
</section>             
                        
     <?php 
					
endwhile;				      
get_footer();
