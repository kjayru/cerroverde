<?php 
function create_post_type_brochure(){
	  register_post_type('brochure_panel',
	  	array(
				'labels' => array(
					'name' => __('Brochures Institucionales'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('Panel')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => get_template_directory_uri().'/brochure/images/icon.png',
				'rewrite' => array('slug'=> 'category/brochures-institucionales','with_front'=> false),
				'supports' => array('title','editor','thumbnail'),
				'taxonomies' => array('category')
		)
	  );
	}
	add_action('init','create_post_type_brochure');
?>