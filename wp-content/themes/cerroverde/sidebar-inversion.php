<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cerro-verde
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
wp_nav_menu( array( 
  'theme_location' => 'sidebar4', 
  'container_class' => 'SideNav',
  'walker' => new Walker_Quickstart_Menu(),
  'menu_class' => 'nav nav-list hidden-xs',
  'menu_id' => 'menu-sidebar')
); 
?>


<div class="parsys hidden-sm hidden-md hidden-lg">
 <div class="container">
  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">
   <div class="threeLevelPagesTree">

	<div class="sidenavtitle">Saltar sección<span class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
        <div class="panel-group" id="sidenav">
        <?php
             wp_nav_menu( array( 
                'theme_location' => 'sidebar4', 
                'container_class' => 'SideNavMov',
                'walker' => new Walker_sidebar_movile(),
                'menu_class' => 'panel panel-default',
                )
            );   
            ?>
                    
        </div>
	 </div>
  </div>
  </div>
</div>

