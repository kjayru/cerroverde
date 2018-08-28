<?php
/**
 * cerro-verde functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cerro-verde
 */

if ( ! function_exists("cerroverde_setup" ) ) :

function cerroverde_setup() {
	
	load_theme_textdomain("cerroverde", get_template_directory() ,"/languages" );

	// Add default posts and comments RSS feed links to head.
	add_theme_support("automatic-feed-links" );

	
	add_theme_support("title-tag" );

	add_theme_support("post-thumbnails" );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'top' => 'Menu top pagina',
        'footer' => 'Menu pie pagina',
        'sidebar1' => 'Menu sidebar',                      
        'sidebar2' => 'Menu sidebar',
        'sidebar3' => 'Menu sidebar',
        'sidebar4' => 'Menu sidebar',
  ) );
	
	add_theme_support("html5", array("search-form",
		"comment-form",
		"comment-list",
		"gallery",
		"caption",
	) );	
}
endif;
add_action("after_setup_theme", "cerroverde_setup" );



class Walker_Quickstart_Menu extends Walker {

    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "\n<li ><a  href='%s' %s>%s</a></li>\n",
            $item->url,
            ( $item->object_id == get_the_ID() ) ? ' class="active"' : 'class="nodefault"',
            $item->title
        );
    }

}

class Walker_sidebar_movile extends Walker{

    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id' => 'mov_id'
    );

    function start_el( &$output,$item, $depth = 0, $args = array(), $id = 0 ){
        $output .= sprintf('<div class="panel-heading">
        <h4 class="panel-title">
            <a href="%s" %s>%s</a>
        </h4>
      </div>',
      $item->url,
      ($item->object_id == get_the_ID()) ? 'class="active collapse"':'class"collapse"',
      $item->title
      );
    }
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() ."/inc/custom-header.php";

/**
 * Custom template tags for this theme.
 */
require get_template_directory() ."/inc/template-tags.php";

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() ."/inc/template-functions.php";
/**
 * Customizer additions.
 */
require get_template_directory() ."/inc/customizer.php";


function home_titul($atts, $content = null) {
   extract(shortcode_atts(array(
      'color' => 1,
   ), $atts));

 $return_string ='<div class="presentacion-seccion">';
 $return_string .='<img src="'.get_template_directory_uri().'/img/icono-creciendo-con-cerro-verde.png" alt="Desarrollo sostenible">';
 $return_string .='<h2 class="titulo-seccion"><strong>'.$content.'</strong></h2>';					
 $return_string .='</div>';

  
   return $return_string;
}
add_shortcode( 'home_titulo', 'home_titul');

function titulo_respon($atts, $content = null){
$return_string ='<div class="presentacion-seccion">';
$return_string .='<img src="'.get_template_directory_uri().'/img/logoresponsabilidad.png" alt="Responsabilidad social">';
$return_string .='<h2 class="titulo-desarrollo"><strong>'.$content.' </strong></h2>';
$return_string .='</div>';
return $return_string;		  
}
add_shortcode( 'titulo_responsabilidad', 'titulo_respon');

function titulo_gen($atts, $content = null){
	 $return_string ='<div class="presentacion-seccion">';
     $return_string .='<h2 class="titulo-seccion double-line"><strong>'.$content.'</strong></h2>';           
     $return_string .='</div>';	
	  return $return_string;		  
}
add_shortcode( 'titulo_general', 'titulo_gen');

function ico_mina($atts, $content = null){
	$return_string=' <div class="iconmino">';
    $return_string .='<img src="'.get_template_directory_uri().'/img/iconmina.png"  class="center-block">';
    $return_string .='</div>';
	return $return_string;	
	}
add_shortcode( 'icon_mina', 'ico_mina');

function ico_carr($atts, $content = null){
	$return_string=' <div class="iconmino">';
    $return_string .='<img src="'.get_template_directory_uri().'/img/icocarro.png"  class="center-block">';
    $return_string .='</div>';
	return $return_string;	
	}
add_shortcode( 'icon_carro', 'ico_carr');

function ico_edif($atts, $content = null){
	$return_string=' <div class="iconmino">';
    $return_string .='<img src="'.get_template_directory_uri().'/img/icoedifico.png"  class="center-block">';
    $return_string .='</div>';
	return $return_string;	
	}
add_shortcode( 'icon_edificio', 'ico_edif');

function tex_generico($atts, $content = null){
	$color = $atts['color'] ;
	$return_string=' <div class="textgenerico" style="color:'.$color.'">';
    $return_string .=$content;
    $return_string .='</div>';
	return $return_string;	
	}
add_shortcode( 'titulo_generico', 'tex_generico');

function titulo_short($atts, $content = null){
	$color = $atts['color'] ;
	$return_string=' <div class="title-general" style="color:'.$color.'">';
    $return_string .=$content;
    $return_string .='</div>';
	return $return_string;	
	}
add_shortcode( 'titulo', 'titulo_short');

/*
wp_localize_script('ajax_test', 'wp_ajax_tets_vars', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
));

add_action('wp_ajax_nopriv_get_next_posts', 'ajax_get_next_posts');

add_action('wp_ajax_get_next_posts', 'ajax_get_next_posts');


function ajax_get_next_posts(){
	// usamos absint() para sanitizar el valor y recibir un int
	$offset     = absint( $_REQUEST['posts_offset'] );	
	$next_posts = new WP_Query(array(
		'offset'      => $offset,
		'post_type'   => 'noticias_media',
		'post_status' => 'publish'
	));
	if ( $next_posts->have_posts() ) {
		// devolvemos como output el listado de posts como JSON
		header('Content-Type: application/json');
		echo json_encode( $next_posts->posts );
		// como es una petición AJAX, cortamos inmediatamente la ejecución de PHP
		exit;
	}
	echo json_encode( array() );
	exit;
}
*/


function cerroverde_custom_category_single_template( $single_template ) {

    global $post;

    // get all categories of current post
    $categories = get_the_category( $post->ID );
    $top_categories = array();

    // get top level categories
    foreach( $categories as $cat ) {
        if ( $cat->parent != 0 ) {
            $top_categories[] = $cat->parent;
        } else {
            $top_categories[] = $cat->term_id;
        }
    }

    // check if specific category exists in array
    if ( in_array( '8', $top_categories ) ) {
        if ( file_exists( get_template_directory() . '/single-custom.php' ) ) return get_template_directory() . '/single-custom.php';
    }

    return $single_template;

}

add_filter( 'single_template', 'cerroverde_custom_category_single_template' );

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*
function getPostShare($postID){
    $count_key = 'post_views_share';
    $count = get_post_meta($postID, $count_key, true);
	
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}


function setPostShare($postID) {
    $count_key = 'post_views_share';
    $count = get_post_meta($postID, $count_key, true);
	
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
*/
function limit_search_posts($query) {
  if ($query->is_search) {
  $query->set('post_type','media_post');
  }
  return $query;
}
//add_filter('pre_get_posts','limit_search_posts');


add_action('wp_enqueue_scripts', 'media_insert_js');

function media_insert_js(){
	
	wp_register_script('media_script', get_template_directory_uri(). '/js/media_post.js?v=2', array('jquery'), '1', true );
	wp_enqueue_script('media_script');
	wp_localize_script('media_script','media_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);

}


add_action('wp_ajax_nopriv_media_ajax','media_enviar_contenido');
add_action('wp_ajax_media_ajax','media_enviar_contenido');

function media_enviar_contenido()
{

	$id_post = absint($_POST['id_post']);
	

$the_query = new WP_Query(array(
	'post_type'			=> 'media_post',
	'category_name'		=>'prensa',
	'posts_per_page'	=> -1,
	'meta_key'			=> 'year',
	'orderby'			=> 'meta_value',
	'order'				=> 'DESC'
));


		 
		  
	

	//sleep(2);
	
	echo json_encode($the_query);

	wp_die();
}


include (TEMPLATEPATH.'/sliders/php/slider_function_include.php');
include (TEMPLATEPATH.'/desarrollo/php/desarrollo_function_include.php');
include(TEMPLATEPATH.'/historias/php/historias_function_include.php');
include(TEMPLATEPATH.'/revistas/php/revistas_function_include.php');


function parallelize_hostnames($url, $id) {
 $hostname = par_get_hostname($url); 
 $url = str_replace(parse_url(get_bloginfo('url'), PHP_URL_HOST), $hostname, $url);
 return $url;
}
function par_get_hostname($name) {
 $subdomains = array('static1.cerroverde.com.pe','static2.cerroverde.com.pe','static3.cerroverde.com.pe','static4.cerroverde.com.pe'); 
 $host = abs(crc32(basename($name)) % count($subdomains));
 $hostname = $subdomains[$host];
 return $hostname;
}
add_filter('wp_get_attachment_url', 'parallelize_hostnames', 10, 2);


function cerroverdeprod_scripts() {
	wp_enqueue_style("cerroverde-bootstrap", get_template_directory_uri()."/vendor/css/bootstrap.min.css",array(),"20151215",false);
	wp_enqueue_style("cerroverde-animate", get_template_directory_uri()."/vendor/css/animate.min.css",array(),date("hms"),false);
	wp_enqueue_style("cerroverde-mightyslider", get_template_directory_uri()."/vendor/css/mightyslider.css",array(),"20151215",false);
	wp_enqueue_style("cerroverde-mightyslider-anim", get_template_directory_uri()."/vendor/css/mightyslider.animate.css",array(),"20151215",false);
	wp_enqueue_style("cerroverde-awesome", get_template_directory_uri()."/css/font-awesome.min.css",array(),date("Yhms"),false);
	wp_enqueue_style("cerroverde-timeline", get_template_directory_uri()."/css/timeline.css",array(),date("hms"),false);
	wp_enqueue_style("cerroverde-main", get_template_directory_uri()."/css/main.css",array(),date("sdmhms"),false);
	wp_enqueue_style("cerroverde-style", get_template_directory_uri()."/css/style.css?v=126",array(),"20180616",false);
	wp_enqueue_style("cerroverde-anim-2", get_template_directory_uri()."/css/anim.css",array(),"20151215",false);
    
    /*wp_enqueue_script("cerroverde_jquery",get_template_directory_uri()."/js/vendor/jquery-1.12.0.min.js",array(),"20170101",true);
    wp_enqueue_script("cerroverde_scriptmin",get_template_directory_uri()."/assets/js/scripts.min.js",array(),"20170101",true);
	wp_enqueue_script("cerroverde_main",get_template_directory_uri()."/js/main.js?v=7",array(),date("hms"),true);*/
	
wp_enqueue_script("cerroverde_jquery",get_template_directory_uri()."/vendor/js/jquery.min.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_mightyslider",get_template_directory_uri()."/vendor/js/mightyslider.min.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_mightyslider_anim",get_template_directory_uri()."/vendor/js/mightyslider.animate.plugin.min.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_migrate",get_template_directory_uri()."/vendor/js/jquery.migrate.min.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_bootstrap",get_template_directory_uri()."/vendor/js/bootstrap.min.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_mobile",get_template_directory_uri()."/js/vendor/mobile-detect.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_tweenlite",get_template_directory_uri()."/vendor/js/tweenlite.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_easing",get_template_directory_uri()."/js/vendor/jquery.easing-1.3.pack.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_ttw",get_template_directory_uri()."/js/vendor/jquery.mobile.just-touch.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_parallax",get_template_directory_uri()."/vendor/js/jquery.parallax-1.1.3.js",array(),"20170101",true);
wp_enqueue_script("cerroverde_timeline",get_template_directory_uri()."/js/timeline.js",array(),date("hms"),true);
wp_enqueue_script("cerroverde_main",get_template_directory_uri()."/js/main.js?v=".date("hms"),array(),date("hms"),true);
    
}
add_action("wp_enqueue_scripts", "cerroverdeprod_scripts" );


function add_async_to_script($tag, $handle) {
   // agregar los handles o identificadores de los scripts al array
   $scripts_to_async = array('script-name', 'script-2');
    
  // recorremos el array y agregamos el atributo async defer
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async defer src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_async_to_script', 10, 2);


