<?php 
function create_post_type_desarrollo(){
	  register_post_type('desarrollo_panel',
	  	array(
				'labels' => array(
					'name' => __('Desarrollo sostenible'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('HomeDesarrollo')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' =>'dashicons-images-alt2',
				'rewrite' => array('slug'=> 'leermas','with_front'=> false),
				'supports' => array('title','editor','thumbnail'),
				'taxonomies' => array('category')
		)
	  );
	}
	add_action('init','create_post_type_desarrollo');
?>