<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cerro-verde
 */

get_header(); ?>
<section>
	<div class="container">
    	
		<div class="row">
	   
			<div class="col-lg-12 col-sm-12 col-md-12">
            	<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				
				

			endwhile; 
			?>
            </div>
    </div>
   </div>
</section> 
	

<?php

get_footer();
