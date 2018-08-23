<?php 
/*
Template name:home
*/
get_header();
while ( have_posts() ) {
	 the_post();
 ?>

         <section class="slider-principal rotador-contenedor animation fadeInUp animation-visible" data-animation="fadeInUp">
                    <div class="swiper-container rotador-padre">
                        <div class="swiper-wrapper rotador-interior rt-home">
                        
                        
    		 <?php 
						$argi=array(
						  'suppress_filters' => false,
						  'post_type'=>'slider_panel',
						  'post_status' => 'publish',
						  'numberposts'=>'20',
						  'orderby'=>'date',
						  'post_parent'=>0,
						  'sort_order' => 'desc'
						);
							$sliders = get_posts($argi);
						

				foreach($sliders as $slider){
					$tipo = get_field("tipo_slide",$slider->ID);
					$tipo_video = get_field("tipo_video",$slider->ID);
					$file_video = get_field("file_video",$slider->ID);
					$embed_video = get_field("embed_video",$slider->ID);
					$embed_video_fondo = get_field("embed_video_fondo",$slider->ID);
					$media = get_field("media_file",$slider->ID);
					$descripcion = get_field("descripcion",$slider->ID);
					$tipo_enlace = get_field("tipo_enlace",$slider->ID);
					$enlace_externo = get_field("enlace_externo",$slider->ID);
					$enlace_interno = get_field("enlace_interno",$slider->ID);
					$enlace = get_field("enlace",$slider->ID);
					$fondo_mobile = get_field("fondo_mobile",$slider->ID);
					
					
				 if($tipo=="Video"){ ?>
					 
							<article class="swiper-slide rotador-unidad">
						
				 <?php }else{ 
								 if(!$fondo_mobile){
					 ?>
									 <article class="swiper-slide rotador-unidad" style="background:url(<?php echo $media['url']; ?>) no-repeat center center; background-size:cover;">
							 <?php
								  }else{ ?>
									 <article class="swiper-slide rotador-unidad" style="background:url(<?php echo $fondo_mobile['url']; ?>) no-repeat center center; background-size:cover;">
							<?php }                               
				 		}
					 ?>
					
						 
					<?php if($tipo==="Video"){
						
								if( $tipo_video!="embed"){
						?>
						   <div class="bg-video">
							 <video autoplay loop>
								 <source src="<?php echo $file_video['url']; ?>" type="video/mp4">
							 </video>
						   </div>
						 <?php 
								}else{
						 ?>
							 <div class="bg-video">
							   <iframe id="player" class="playerdiv hidden-xs" type="text/html" width="640" height="360" allowfullscreen="1"
							   src="https://www.youtube.com/embed/<?php echo $embed_video_fondo ?>?rel=0&autoplay=1&mute=1&autohide=0&controls=0&loop=1&autopause=0&playlist=<?php echo $embed_video ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							 <?php  if(!$fondo_mobile){ ?>
									 <div class="bgvideo_movil hidden-md hidden-sm hidden-lg" style="background:url(https://i.ytimg.com/vi/<?php echo $embed_video; ?>/maxresdefault.jpg) no-repeat center center; background-size:cover;">
									 <?php }else{ ?>
									 <div class="bgvideo_movil hidden-md hidden-sm hidden-lg" style="background:url(<?php echo $fondo_mobile['url']; ?>) no-repeat center center; background-size:cover;">
									<?php } ?>  
							   </div>
								<div class="patronvideo"></div>
						   </div>
						 
						 <?php		
							 }
					}
						  
				
				   ?>
                                
                                <div class="limite">
                                    <p>
                                       <?php  echo $descripcion; ?>
                                    </p>
                                        <?php  if( $tipo_video!="embed"){ ?>
                                         <a href="<?php  echo $enlace; ?>" class="boton naranja">leer más</a>    
										 <?php }else{ ?>
										<a href="#" class="boton naranja modal_slide" data-video="<?php echo $embed_video ?>">Ver video completo</a>    
										 <?php } ?>
                                </div>
                            </article>
                        
                      
			<?php
			//endforeach
					} ?>            
                        </div>
                    </div>
                    <div class="rotador-paginador">
                        <div class="limite">
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
        </section>
		
		
		<section id="desarrollo-sostenible" class="padding-lateral seccion-desarrollo-sostenible">
		  <div class="container">
			 <div class="row">
				<div class="col-md-12">
					<div class="presentacion-seccion">
						<img src="<?php echo get_template_directory_uri(); ?>/img/icono-desarrollo-sostenible.png" alt="Desarrollo sostenible" />
						<h2 class="titulo-seccion single-line"><strong> <?php $titulo = get_field('titulo_desarrollo_sostenible',$post->ID);
			 		echo $titulo;
			  ?></strong></h2>
						<p>
							
                            <?php $direccion = get_field('texto_desarrollo_sostenible',$post->ID);
			 		echo $direccion;
			  ?>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
			  <div class="col-md-10 col-md-offset-1 medios">
	
                   <div class="wrapper">
                    
                    <?php 
                        $arg=array(
                          'suppress_filters' => false,
                          'post_type'=>'desarrollo_panel',
                          'post_status' => 'publish',
                          'numberposts'=>'20',
                          'orderby'=>'menu_order',
                          'post_parent'=>0,
                          'order' => 'DESC'
                        );
                            $desarrollos = get_posts($arg);
                                 
                           foreach ($desarrollos as $desarrollo){
                          
                           $titulo = get_field("titulo",$desarrollo->ID);
                           $descripcion = get_field("descripcion",$desarrollo->ID);
                           $imagen = get_field("imagen",$desarrollo->ID);
                           $enlace = get_field("enlace",$desarrollo->ID);              
                           ?>
                              <div class="col_third col-md-4 col-sm-4 col-xs-12">
                                <div class="hover panel">
                                  <div class="front">
                                    <div class="box1" style="background:url('<?php echo $imagen['url']; ?>'); background-size:cover;">
                                    
                                    </div>
                                    <div class="btitulo"><?php echo $titulo; ?></div>
                                  </div>
                                  <div class="back">
                                    <div class="box2">
                                       <p>
                                         <strong><?php echo $titulo; ?></strong><span l></span><span t><?php echo $descripcion; ?></span><a href="<?php echo $enlace; ?>" class="boton blanco">Conoce más</a>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                            </div>
					   <?php 
                       }
                       ?> 
                   </div>
			  </div>
            </div>
            <div class="row">
			  <div class="col-md-12">
				<div class="wrap-boton text-center">
					<!--<a href="#" class="boton naranja">Conoce mas aquí</a>-->
				</div>
			  </div>
			 </div>
		  </div>
		</section>

		<section class="padding-lateral seccion-creciendo-con-cerro-verde" >
			<article class="">
				<div class="presentacion-seccion">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icono-creciendo-con-cerro-verde.png" alt="Desarrollo sostenible" />
					<h2 class="titulo-seccion single-line"><strong><?php  echo get_field("titulo_creciendo",$post->ID);?></strong></h2>
					<p>
                    <?php  echo get_field("descripcion_creciendo",$post->ID);?>
                    </p>
				</div>
             <div class="capa-circulos"> 
				<div class="contenedor-slider-circulos">
					<div class="bg-sprite boton-circulo prev prevCirculo"></div>
					<div class="swiper-container circulos" animCirculo>
						<div class="swiper-wrapper">
							<?php 
							$circulos = get_field("creciendo_cerro_verde",$post->ID);
							foreach($circulos as $cir): ?>
                            
                            <div class="swiper-slide">
								<div class="unidad-circulo">
									<div a></div><div b></div>
									<div c>
										<div>
											<strong><?php echo $cir['titulo_top']; ?> </strong>
											<span><?php echo $cir['texto_central']; ?></span>
											<strong><?php echo $cir['texto_down']; ?></strong>
											<p><?php echo $cir['text_bottom']; ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
							
						</div>
					</div>
					<div class="bg-sprite boton-circulo next nextCirculo"></div>
				</div>
			 </div>  	
			</article>
		</section>
        <!-- parallax block-->
         <?php $img =  get_field("imagen_parallax",$post->ID); ?>
        <section class="seccion-opcional hidden-xs" style="background: url(<?php echo $img['url']; ?>) no-repeat center center;">
		  <div class="inner container">
			 <div class="row">
			<div class="col-md-6 col-md-offset-6 col-xs-12 limite">
				
					
					<?php echo get_field("contenido_parallax",$post->ID); ?>
				
			</div>
			</div>
		   </div>
		</section>
         <section class="seccion-opcional hidden-lg hidden-md hidden-sm" style="background: #F16E2E; ">
		  <div class="inner container">
			 <div class="row">
			<div class="col-md-6 col-md-offset-6 col-xs-12 limite">
					<img src="https://static4.cerroverde.com.pe/wp-content/uploads/2018/04/banner-cortado.png" alt="Míneria con principios" class="img-responsive">
					<div>
					<?php echo get_field("contenido_parallax",$post->ID); ?>
					</div>
			</div>
			</div>
		   </div>
		</section>
        <!-- destacados noticias-->
        <section class="padding-vertical box-posts">

			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="heading">
							<h2 class="title"><span class="hv-icons hv-news"></span> Novedades</h2>
							<div class="pager">
								<div class="bg-sprite boton-cuadrado prev"></div>
								<div class="bg-sprite boton-cuadrado next"></div>
							</div>
						</div>
					</div>
					<div class="col-md-12">	
						<div class="list-posts">
							<div class="swiper-wrapper">
							<?php 
							$args = array(
								'posts_per_page' => 10,
								'post_type'=>'media_post',
								
								'orderby'=>'post_date',
							);
							
							$prensa = new WP_Query($args);
							
							if ( $prensa->have_posts() ) {
								while ( $prensa->have_posts() ) {

								$prensa->the_post();
								
								$media  = get_field('media',$prensa->ID);
								$titulo = get_field('titulo',$prensa->ID);
								$imagen = get_field('imagen',$prensa->ID);
								$fuente = get_field('fuente',$prensa->ID);
								$video  = get_field('video',$prensa->ID);
								$contenido  = get_field('contenido',$prensa->ID);
								$year = get_field('year',$prensa->ID);
								$mes = get_field('mes',$prensa->ID);
								$destacado = get_field('destacado',$prensa->ID);
								
								if($destacado=="Si"){ ?> 
								
								<article class=" item-posts swiper-slide">
									<div class="imagen">
										<img src="<?php echo $imagen['url'];?>" alt="">
									</div>
									<div class="date">
										<span><?php 
										$post_date = get_the_date( 'l F j, Y' ); 
										echo $post_date;
										
									?>
										</span>
									</div>
									<h3 class="title"> <?php echo $titulo; ?></h3>
									<div class="content">
										
										<?php $content = strip_tags($contenido); 
										echo mb_strimwidth($content, 0, 100, '...'); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="boton transparente">Leer más</a>
								</article>
								
								<?php 
								}
								}
								}else{
								echo '...';
								}
							?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
<!--implementation modal-->
<div id="ctl-wrapper-modal" class="ctl-wrapper-modal">
	<div class="contenedores">
    	<a href="#" class="ctl-wrapper-cerrar ctl-closeBox" id="ctl-wrapper-close"><img src="http://static.claro.com.pe/landings/havas/cobertura-sin-frontera/img/cerrarBox.png" width="40"></a>
    	<div id="ctl-player"></div>
    </div>
</div>	
<?php
//endwhile
}

get_footer();
?>