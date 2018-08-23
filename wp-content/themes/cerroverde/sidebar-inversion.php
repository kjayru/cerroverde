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
  <li class="nav-header">RELACIÓN CON INVERSIONISTAS</li>        
  <li><a href="/relacion-con-inversionistas/junta-general-de-accionistas" class="<?php geturl2("junta-general-de-accionistas"); ?>"> Junta general de accionistas</a></li>
  <li><a href="/relacion-con-inversionistas/proteccion-de-accionistas-minoritarios" class="<?php geturl2("proteccion-de-accionistas-minoritarios"); ?>"> Protección de accionistas minoritarios</a></li>
  <li><a href="/relacion-con-inversionistas/contacto" class="<?php geturl2("contacto"); ?>"> Contacto</a> </li>
 
</ul>

<div class="parsys hidden-sm hidden-md hidden-lg">
 <div class="container">
  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">
   <div class="threeLevelPagesTree">

	<div class="sidenavtitle">Saltar sección<span class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
        <div class="panel-group" id="sidenav">
            <h4 class="root-page-panel"> 
                <a href="#" class="<?php // geturl("conocenos"); ?> collapsed">Relación con inversionistas</a>
            </h4>
        
                  <div class="panel panel-default">
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/relacion-con-inversionistas/junta-general-de-accionistas" class="<?php geturl2("junta-general-de-accionistas"); ?> collapsed">Junta general de accionistas</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/relacion-con-inversionistas/proteccion-de-accionistas-minoritarios" class="<?php geturl2("proteccion-de-accionistas-minoritarios"); ?>  collapsed">Protección de accionistas minoritarios</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/relacion-con-inversionistas/contacto" class="<?php geturl2("contacto"); ?> collapsed"> Contacto</a>
                             </h4>
                           </div>
                           
                           
                             
                  </div>
                    
        </div>
	 </div>
  </div>
  </div>
</div>

