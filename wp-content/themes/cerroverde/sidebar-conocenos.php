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

<?php 

?>
<ul class="nav nav-list hidden-xs"> 
  <li class="nav-header">CONÓCENOS</li>        
  <li><a href="/conocenos/vision-y-mision" class="<?php geturl2("vision-y-mision"); ?>"> Visión y Misión</a></li>
  <li><a href="/conocenos/historia" class="<?php geturl2("historia"); ?>"> Historia</a></li>
  <li><a href="/conocenos/nuestras-politicas" class="<?php geturl2("nuestras-politicas"); ?>"> Nuestras Políticas</a></li>
  <li><a href="/conocenos/certificaciones" class="<?php geturl2("certificaciones"); ?>"> Certificaciones</a> </li>
  <li><a href="/conocenos/premios-obtenidos" class="<?php geturl2("premios-obtenidos"); ?>"> Premios Obtenidos</a> </li>
  <li><a href="/conocenos/somos-parte-de" class="<?php geturl2("somos-parte-de"); ?>"> Somos parte de</a> </li>
</ul>

<div class="parsys hidden-sm hidden-md hidden-lg">
 <div class="container">
  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">
   <div class="threeLevelPagesTree">

	<div class="sidenavtitle">Saltar sección<div class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></div></div>
        <div class="panel-group" id="sidenav">
            <h4 class="root-page-panel"> 
                <a href="/conocenos" class="<?php // geturl("conocenos"); ?> collapsed">Conocenos</a>
            </h4>
        
                  <div class="panel panel-default">
                  			<div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/conocenos/vision-y-mision" class="<?php geturl2("historia"); ?> collapsed">Visión y Misión</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/conocenos/historia" class="<?php geturl2("historia"); ?> collapsed">Historia</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/conocenos/nuestras-politicas" class=" <?php geturl2("nuestras-politicas"); ?>collapsed"> Nuestras Políticas</a>
                             </h4>
                           </div>
                          
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/conocenos/premios-obtenidos" class="<?php geturl2("premios-obtenidos"); ?> collapsed"> Premios Obtenidos</a>
                             </h4>
                           </div>
                            <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/conocenos/somos-parte-de" class="<?php geturl2("somos-parte-de"); ?> collapsed"> Somos parte de</a>
                             </h4>
                           </div>
                           
                             
                  </div>
                    
        </div>
	 </div>
  </div>
  </div>
</div>

