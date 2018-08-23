<?php 
function create_post_type_material(){
	  register_post_type('material_panel',
	  	array(
				'labels' => array(
					'name' => __('Material Educativo'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('Panel')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => get_template_directory_uri().'/material/images/icon.png',
				'rewrite' => array('slug'=> 'category/material-educativo','with_front'=> false),
				'supports' => array('title','editor','thumbnail'),
				'taxonomies' => array('category')
		)
	  );
	}
	add_action('init','create_post_type_material');
?>