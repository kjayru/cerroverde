<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cerro-verde
 */

?>
<div class="articulo row">

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="col-md-2">
	<div class="entry-thumb">
		<?php 
		if(get_field("banner",$post->ID)){
		 $img =  get_field("banner",$post->ID);
		  ?>
         
		  
		  <img src="<?php echo $img['sizes'][ 'medium' ]; ?>" alt=""  class="img-responsive">
		  
		 <?php
		}elseif(get_field('slider',$post->ID)){
			
		$slide =  get_field("slider",$post->ID);
		
		 $img = $slide[0]['imagen'];
		 ?>
         <img src="<?php echo $img['sizes'][ 'medium' ]; ?>" alt=""  class="img-responsive">
          <?php
		  
		}else{
			$imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
			$img = $imagen[0];
		
		 ?>
            <img src="<?php echo $img; ?>" alt=""  class="img-responsive">
         <?php
		}
		
		 ?>
        
        
	</div>
    
</div>
 <div class="col-md-10">
	<div class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php cerroverde_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-header -->
</div>
  <div class="col-md-12">
    <div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->	
    
  </div> 
</div>
</div>
