<?php 
/*
Template name:contacto-junta
*/
get_header(); 
while ( have_posts() ) : the_post();?>
<!--breadcrum-->
<div class="container">
	<div class="row">
    <ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" /></a><a href="/relacion-con-nuestros-inversionistas/Junta-general-de-accionistas" class="first-bread"><span>La relación con nuestros inversionistas</span></a></li>
		
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
						get_sidebar('inversion');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10 interna">
                <?php  the_content();?>
                
                  
            </div>
    </div>
   </div>
</section>             
                        
     <?php 
	 endwhile;
				      
get_footer();
