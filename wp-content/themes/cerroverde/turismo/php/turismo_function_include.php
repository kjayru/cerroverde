<?php 
function create_post_type_turismo(){
	  register_post_type('turismo_panel',
	  	array(
				'labels' => array(
					'name' => __('Turismo'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('Panel')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => get_template_directory_uri().'/turismo/images/icon.png',
				'rewrite' => array('slug'=> 'category/turismo','with_front'=> false),
				'supports' => array('title','editor','thumbnail'),
				'taxonomies' => array('category')
		)
	  );
	}
	add_action('init','create_post_type_turismo');
?>