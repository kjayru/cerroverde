<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cerro-verde
 */

?>

<section class="no-results not-found">
	
	<div class="page-content" style="text-align:left;">
		

		<?php if ( is_search() ) : ?>
			<h1 class="page-title">Ningun Resultado para:
          <span><?php echo '"'.get_search_query().'"<br>'; ?></span></h1>
			<p class="contador-resultado" style="text-align:left; font-size:20px;">
 <?php 
 esc_html_e( 'Lo Sentimos la palabra "'.get_search_query().'" no produjo ningún resultado', 'cerroverde' ); ?></p>
			
            
			<?php
				get_search_form();

		
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
