<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cerro-verde
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cerroverde' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
