<?php 
function create_post_type_reporte(){
	  register_post_type('reporte_panel',
	  	array(
				'labels' => array(
					'name' => __('Reporte y Sostenibilidad'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('Panel')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => get_template_directory_uri().'/reporte/images/icon.png',
				'rewrite' => array('slug'=> 'category/reporte-y-sostenibilidad','with_front'=> false),
				'supports' => array('title','editor','thumbnail'),
				'taxonomies' => array('category')
		)
	  );
	}
	add_action('init','create_post_type_reporte');
?>