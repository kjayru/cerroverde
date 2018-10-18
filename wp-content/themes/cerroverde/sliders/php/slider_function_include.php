<?php 
function create_post_type_slider(){
	  register_post_type('slider_panel',
	  	array(
				'labels' => array(
					'name' => __('Slider Home'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('SliderHome')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => 'dashicons-id',
				'rewrite' => array('slug'=> 'leermas','with_front'=> false),
				'supports' => array('title','editor','thumbnail')
		)
	  );
	}
	add_action('init','create_post_type_slider');
?>