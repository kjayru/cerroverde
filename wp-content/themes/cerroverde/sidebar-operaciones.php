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
  <li class="nav-header">OPERACIONES</li>        
  <li><a href="/operaciones/mina" class="<?php geturl2("mina"); ?>">Mina</a></li>
  <li><a href="/operaciones/hidrometalurgia" class="<?php geturl2("hidrometalurgia"); ?>">Hidrometalurgia</a></li>
  <li><a href="/operaciones/concentracion" class="<?php geturl2("concentracion"); ?>">Concentración</a> </li>
  <li><a href="/operaciones/transporte" class="<?php geturl2("transporte"); ?>">Transporte</a> </li>
  <li><a href="/operaciones/cuidado-del-medio-ambiente" class="<?php geturl2("cuidado-del-medio-ambiente"); ?>">Cuidado del medio ambiente</a> </li>

</ul>

<div class="parsys hidden-sm hidden-md hidden-lg">
 <div class="container">
  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">
   <div class="threeLevelPagesTree">

	<div class="sidenavtitle">Saltar sección<span class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
        <div class="panel-group" id="sidenav">
            <h4 class="root-page-panel"> 
                <a href="/operaciones" class="<?php // geturl("conocenos"); ?> collapsed">Operaciones</a>
            </h4>
        
                  <div class="panel panel-default">
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/operaciones/mina" class="<?php geturl("historia"); ?> collapsed">Mina</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/operaciones/hidrometalurgia" class=" <?php geturl("nuestra-politica"); ?>collapsed">Hidrometalurgia</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/operaciones/concentracion" class=" collapsed">Concentración</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/operaciones/trasnporte" class="<?php geturl("premios"); ?> collapsed">Transporte</a>
                             </h4>
                           </div>
                            <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/operaciones/cuidado-del-medio-ambiente" class=" collapsed">Cuidado del medio ambiente</a>
                             </h4>
                           </div>
                          
                           
                           
                             
                  </div>
                    
        </div>
	 </div>
  </div>
  </div>
</div>

