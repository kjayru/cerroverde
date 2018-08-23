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
			setPostViews(get_the_ID());



if(in_category('noticias')){
	$path= "Noticias";
	$url ="/category/media/noticias/";
	}
elseif(in_category('video')){
	$path= "Video";
	$url ="/category/media/video/";
	}
elseif(in_category('foto')){
	$path= "Foto";
	$url ="/category/media/foto/";
	}
elseif(in_category('prensa')){
	$path= "Nota de Prensa";
	$url ="/category/media/prensa/";
	}		
?>
	
 <div class="container hidden-xs">
<div class="row">
    <style type="text/css">				
		.breadcrumb-container {
		  font-size:   !important;
		}
		
		.breadcrumb-container li a{
		  color:   !important;
		  font-size:   !important;
		  line-height:   !important;
		}
		
		.breadcrumb-container li .separator {
		  color:   !important;
		  font-size:   !important;
		}										
		.breadcrumb-container.theme1 li {
			margin: 0;
			padding: 0;
		}													
		.breadcrumb-container.theme1 a {
			background: ;
			display: inline-block;
			margin: 0 5px;
			padding: 5px 10px;
			text-decoration: none;
		}
</style>
<div class="breadcrumb-container theme1 breadcrumb" itemprop="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList"><ul itemtype="http://schema.org/BreadcrumbList" itemscope=""><li><span class="separator">/</span><a href="#">Media</a></li>
<li><span class="separator">/</span><a title="Noticias" href="<?php echo $url; ?>"><?php echo $path; ?></a><span class="separator">/</span></li>
</ul></div></div>
</div>
			
	<section>
	<div class="container singlemedia">
    	
		<div class="row">
	   
			    <div class="col-lg-11 col-sm-11 col-md-11 col-xs-12 posteo pras">
            	
                <h1><?php  single_post_title(); ?></h1>
                <h4>Fuente: <?php echo get_field("fuente",$post->ID); ?></h4>
                <?php $img =  get_field("banner",$post->ID); ?>
                <div class="banner">
                	<img src="<?php echo $img['url']; ?>" alt="Imagen noticia 1" class="center-block img-responsive">
				</div>
                
                <div class="cheron">
							<a href="#" class="rowdown stack1"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
			    </div>
				<div id="istack1">
                <?php echo get_field("contenido",$post->ID); ?>
                
                </div>
                <!--slider-->
                <?php  $sliders = get_field("slider",$post->ID);
				
				 if($sliders){
				?>
                <div   class="swiper-container noticias-swiper">
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

               
                
                
                 <?php } ?>
             
            </div>
                <?php $tags = wp_get_post_terms(get_the_ID());
					
			    if ($tags){ ?>
                
             <!--  <div class="cheron">
							<a href="#" class="rowdown"> <img  src="<?php echo get_template_directory_uri(); ?>/img/rowdown.png"> </a>
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
            </div>   -->
               <?php } ?>
           
           <div class="sharedbox">
             <div class="sbox1">
            	 <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
             </div>
             <div class="sbox2">
            	 <a href="#" class="share-facebook" title="Share on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
             </div>
             <div class="sbox3">
             	<a href="#" class="share-twitter" target="_blank" data-title="<?php echo get_the_title($post->ID); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'); return false;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
             </div>
             <div class="sbox4">
             	<a href="#" class="share-google"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;"
   target="_blank" title="Share on Google+"><i class="fa fa-google" aria-hidden="true"></i></a>
             </div>
           </div>
        
        </div>
        
   </div>
</section> 

<?php
endwhile; 
?>
<?php

get_footer();
