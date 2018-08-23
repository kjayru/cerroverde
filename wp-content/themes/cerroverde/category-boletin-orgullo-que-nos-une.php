<?php 
get_header();

?>
<section>
<div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-2 col-sm-3 col-md-2">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
				   
						<?php 
						get_sidebar('publicaciones');
						?>
					
				</div>
                </div>
			</div>
   
			<div class="col-lg-10 col-sm-9 col-md-10 contenido">
           <!-- CONTENT -->     
           <?php 
            $args=array(
              'suppress_filters' => false,
              'post_type'=>'revistas_panel',
              'post_status' => 'publish',
              'numberposts'=>'50',
			   'category_name'=>'boletin-orgullo-que-nos-une',
              'orderby'=>'post_date',
              'post_parent'=>0,
              'order'=>'DESC'
            );
            $posts = get_posts($args);?>
			<div class="col-md-12 barrasep">
            	<span>Marzo 2017</span>
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