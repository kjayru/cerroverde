<?php 
function create_post_type_revistas(){
	  register_post_type('revistas_panel',
	  	array(
				'labels' => array(
					'name' => __('Revistas y boletines'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('RevistasBoletines')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => 'dashicons-id-alt',
				'rewrite' => array('slug'=> 'category/revistas-y-boletines','with_front'=> false),
				'supports' => array('title','editor','thumbnail'),
				'taxonomies' => array('category')
		)
	  );
	}
	add_action('init','create_post_type_revistas');
?>