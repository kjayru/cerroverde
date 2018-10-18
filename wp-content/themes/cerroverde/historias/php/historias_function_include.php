<?php function create_post_type_historias(){
	  register_post_type('historias_panel',
	  	array(
				'labels' => array(
					'name' => __('Historias'),
					'query_var' => true,
					'hierarchical' => true,
					'singular_name' => __('Historias')
				),
				'public' => true,
				'has_archive' => false,
				'capability_type' => 'post',
				'menu_icon' => 'dashicons-backup',
				'rewrite' => array('slug'=> 'menu','with_front'=> false),
				'supports' => array('title','editor','thumbnail')
		  		
				
		)
	  );
	}
  add_action('init','create_post_type_historias');
?>