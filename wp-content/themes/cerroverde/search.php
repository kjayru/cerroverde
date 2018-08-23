<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cerro-verde
 */

get_header(); ?>

	<section id="primary" class="container resultados">
		<div class="row">
			<div class="col-md-12">
		<?php
		if ( have_posts() ) : 

			    $allsearch = &new WP_Query("s=$s&showposts=-1");
				$key = wp_specialchars($s, 1);
				$count = $allsearch->post_count;
?>
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultado de búsqueda: %s', 'cerroverde' ), '<span>"' . get_search_query() . '"</span>' );
				?></h1>
		
			<p class="contador-resultado">Se encontraron  <?php echo $count; ?> resultados para tu búsqueda.</p>
			<div class="col-md-12">
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			//the_posts_navigation();
	?>
	</div>
	
	<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			</div>
		</div>
	</section><!-- #primary -->

<?php

get_footer();
