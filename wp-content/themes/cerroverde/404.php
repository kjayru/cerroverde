<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cerroverde
 */

get_header(); ?>

	<div id="primary" class="content-area no-encontrado">
		
			<section class="error-404 not-found container">
            	<div class="row">
				
				<div class="col-md-12">
					
                    <div class="text-404">404</div>
                    <p>Esta no es la página que estás buscando</p>
                    
                    <a href="/" class="btn btn-default btn-grande">IR AL HOME</a><br>
                    <div class="opart"><samp> o<br> Haz una búsqueda</samp></div>
					<?php
						get_search_form();

						
					?>

					

					

				</div><!-- .page-content -->
                </div>
			</section><!-- .error-404 -->

		
	</div><!-- #primary -->

<?php
get_footer();
