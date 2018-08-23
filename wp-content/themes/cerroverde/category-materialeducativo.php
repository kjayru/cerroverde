<?php 
get_header();
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
<div class="breadcrumb-container theme1 breadcrumb" itemprop="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
<ul itemtype="http://schema.org/BreadcrumbList" itemscope="">
<li><span class="separator">/</span><a href="#">Media</a></li><li><span class="separator">/</span><a title="Noticias" href="/category/media/publicaciones/">Publicaciones</a></li>
<li><span class="separator">/</span><a title="Noticias" href="/category/media/brochure/">Brochure</a></li>
<li><span class="separator">/</span><a title="Noticias" href="/category/media/brochure/materialeducativo">Material Educativo</a><span class="separator">/</span></li>
</ul>
</div>
</div>

</div>
<section>
  <div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-3 col-sm-3 col-md-3">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
					<?php 
                    get_sidebar('publicaciones');
                    ?>
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
			<div class="col-lg-9 col-sm-9 col-md-9 contenido material">
           <!-- CONTENT -->     
           <?php 
            $args=array(
              'suppress_filters' => false,
              'post_type'=>'revistas_panel',
              'post_status' => 'publish',
              'numberposts'=>'50',
			   'category_name'=>'materialeducativo',
              'orderby'=>'post_date',
              'post_parent'=>0,
              'order'=>'DESC'
            );
            $posts = get_posts($args);?>
			<div class="col-md-12 barrasep">
            	<span>Material Educativo</span>
            </div>
			  <ul class='lista-cat'>
          	 <?php
			   foreach($posts as $post):
				   
				    foreach(get_field("revistas_y_boletines",$post->ID) as $row): ?>
						<li>
							<?php
							$img =  $row["imagen"];
							?>
							<img src="<?php echo $img['url']; ?>" class="img-responsive">
							<?php 
							$file =  $row["archivo"];?>
                             <a href="<?php echo $file['url']; ?>" target="_blank" class="nombre-cat">
                                <span><?php echo $row["titulo"]; ?></span>
                                <div class="sombra-cat">
                                  <span><?php echo $row["titulo"]; ?></span>
                                </div>
                            </a>
						</li>	
						<?php	
					endforeach;
			endforeach;
			?>
			</ul>
           
           <!--- content end-->  
            
            
            </div>
        </div>
  </div>
</section> 
<?php 
  get_footer();
  ?>