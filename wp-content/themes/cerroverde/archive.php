<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cerro-verde
 */

get_header(); ?>

<section>
  <div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-3 col-sm-3 col-md-3">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
					<?php 
                    get_sidebar('noticias');
                    ?>
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
	<div class="col-lg-9 col-sm-9 col-md-9 content-media">
            
  				

		
		<?php if (have_posts()) : the_post(); ?>
 
        <?php if (is_category()) : ?>
            <h1>Archive for category: <?php singlegle_cat_title(); ?></h1>
        <?php elseif( is_tag() ) : ?>
            <h1>Posts Tagged: <?php single_tag_title(); ?></h1>
        <?php elseif (is_day()) : ?>
            <h1>Archive for <?php the_time('F jS, Y'); ?></h1>
        <?php elseif (is_month()) : ?>
            <h1>Archive for <?php the_time('F, Y'); ?></h1>
        <?php elseif (is_year()) : ?>
            <h1>Archive for <?php the_time('Y'); ?></h1>
        <?php elseif (is_author()) : ?>
            <h1>Author Archive</h1>
        <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
            <h1>Archives</h1>
        <?php endif; ?>
 
        <?php rewind_posts(); ?>
 
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
 
    <?php else : ?>
 
        <?php if (is_category()) :  ?>
            <h1>Sorry, but there aren't any posts in the <?php single_cat_title(); ?> category yet.</h1>
        <?php elseif (is_date()) : ?>
            <h1>Sorry, but there aren't any posts with this date.</h1>
        <?php elseif (is_author()) : ?>
            <?php get_userdatabylogin(get_query_var('author_name')); ?>
            <h1>Sorry, but there aren't any posts by <?php echo $userdata->display_name; ?> yet.</h1>
        <?php else : ?>
            <h1>No posts found.</h1>
        <?php endif; ?>
 
   

		
			<div class="col-md-12 barrasep">
                  <span><?php   the_title(); ?></span>
            </div>
			

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				
				   wp_get_archives('type=monthly');
			endwhile;

			the_posts_navigation();

		

		endif; ?>

	          </div>
        </div>
    </div>
</section>

<?php

get_footer();
