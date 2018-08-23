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
?>

<ul class="nav nav-list hidden-xs"> 
 
  <li class="nav-header">PUBLICACIONES</li>
   
  <li><a href="/category/media/publicaciones/brochure" class="<?php geturl3("circulo-virtuoso-del-agua"); ?>">Brochure</a></li>
   
</ul>


<div class="parsys hidden-sm hidden-md hidden-lg">
 <div class="container">
  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">
   <div class="threeLevelPagesTree">

	<div class="sidenavtitle">Saltar sección<span class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
        <div class="panel-group" id="sidenav">
            <h4 class="root-page-panel"> 
                <a href="/category/media/publicaciones/brochure" class=" collapsed">Publicaciones</a>
            </h4>
        
                  <div class="panel panel-default">
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/category/media/publicaciones/brochure" class="collapsed">Brochure</a>
                             </h4>
                           </div>
                             
                  </div>
                    
        </div>
	 </div>
  </div>
  </div>
</div>