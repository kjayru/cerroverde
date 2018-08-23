<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cerro-verde
 */

get_header(); ?>
<?php
			while ( have_posts() ) : the_post();

				?>
				
	<section>
	<div class="container">
    	
		<div class="row">
	   
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 posteo prnsa">
            	
                <h1> <?php  single_post_title(); ?></h1>
                <h4>Fuente <?php echo get_field("fuente",$post->ID); ?></h4>
                <?php $img =  get_field("banner",$post->ID); ?>
                <img src="<?php echo $img['url']; ?>" alt="Imagen noticia 1" class="center-block img-responsive">
				<div class="cheron">
							<a href="#" class="rowdown"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			    </div>
				
                <?php the_content();?>
                
                
                <!--slider-->
                <?php  $sliders = get_field("slider",$post->ID);?>
                <div class="swiper-container noticias-swiper">
                    <div class="swiper-wrapper">
                       <?php foreach($sliders as $slider): 
					   		 $img = $slider['imagen'];
					   ?>
                        <div class="swiper-slide"><img src="<?php echo  $img['url']; ?>" alt="Imagen noticia 1" class="center-block img-responsive"></div>
                        
                       <?php endforeach; ?>
                      
                    </div>
                  
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                </div>

                
                
                <div class="cheron">
							<a href="#" class="rowdown"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			    </div>
                
             
            </div>
            
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            	<h3 class="subtitulo">Noticias Relacionadas</h3>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 relacionados">
            <?php 
					
					 $tags = wp_get_post_terms(get_the_ID());
					
					 if ($tags){
							
							 $tagcount = count( $tags );
								 for( $i = 0; $i < $tagcount; $i++ ){
								 $tagIDs[$i] = $tags[$i]->term_id;
								 }
								 $args=array(
									 'tag__in' => $tagIDs,
									 'post__not_in' => array( $post->ID ),
									 'posts_per_page' => 3,
									 'ignore_sticky_posts' => 1
								 );
						 $relatedPosts = new WP_Query( $args );
						 if( $relatedPosts->have_posts() ) {
					
							 while ( $relatedPosts->have_posts() ) :
							 $relatedPosts->the_post(); 
							 
							 
							 $thumb_url  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium', true );
							 $url        = $thumb_url[0];
							 ?>  
								<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6">
								   <article class=" item-posts swiper-slide">
									   <div class="imagen">
											<img src="<?php echo $url; ?>" alt="" class="img-responsive center-block">
										</div>
										<div class="date">
											<span><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date; ?></span>
										</div>
										
										<div class="content">
											<?php $content = get_the_content(); echo mb_strimwidth($content, 0, 80, '...'); ?>
										</div>
										
										 <p><a href="<?php the_permalink(); ?>">
									 <?php the_title(); ?></a></p>
									</article>
								</div>
					  
							 <?php
							 endwhile;
						 }
					 }
					 ?>    
            </div>   
    </div>
   </div>
</section> 

<?php
endwhile; 
?>
<?php

get_footer();
