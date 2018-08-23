<?php 
/*
Template name:reporte-sostenibilidad
*/
get_header(); ?>
<!--breadcrum-->
<div class="container">
	<div class="row">
    <ol class="breadcrumb hidden-xs">
		<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" /></a><a href="/publicaciones" class="first-bread"><span>Reporte y Sostenibilidad</span></a></li>
		
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
						get_sidebar('media');
						?>
					
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-10 col-sm-9 col-md-10">
            
            </div>
    </div>
   </div>
</section>             
                        
     <?php 
						$argi=array(
						  'suppress_filters' => false,
						  'post_type'=>'slider_panel',
						  'post_status' => 'publish',
						  'numberposts'=>'20',
						  'orderby'=>'menu_order',
						  'post_parent'=>0,
						  'order' => 'DESC'
						);
							$sliders = get_posts($argi);
				      
get_footer();
