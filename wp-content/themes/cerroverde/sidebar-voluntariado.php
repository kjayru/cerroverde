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
  <li class="nav-header">DESARROLLO SOSTENIBLE</li>   
  
   <li> <a href="/desarrollo-sostenible/responsabilidad-social-empresarial" class="<?php geturl2("responsabilidad-social-empresarial"); ?>">Responsabilidad social empresarial</a></li>
    <li><a href="/desarrollo-sostenible/voluntariados-corporativos/" class="<?php geturl2("voluntariados-corporativos"); ?>"> Voluntariados corporativos</a></li> 
  
</ul>


<div class="parsys hidden-sm hidden-md hidden-lg">
 <div class="container">
  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">
   <div class="threeLevelPagesTree">

	<div class="sidenavtitle">Saltar sección<div class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></div></div>
        <div class="panel-group" id="sidenav">
            <h4 class="root-page-panel"> 
                <a href="/desarrollo-sostenible/responsabilidad-social-empresarial" class="collapsed">Desarrollo Sostenible</a>
            </h4>
        
                  <div class="panel panel-default">
                  		   <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/desarrollo-sostenible/responsabilidad-social-empresarial" class="collapsed">Responsabilidad social empresarial</a>
                             </h4>
                           </div>
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                 <a href="/desarrollo-sostenible/voluntariados-corporativos" class="collapsed">Voluntariados corporativos</a>
                             </h4>
                           </div>
                             
                  </div>
                    
        </div>
	 </div>
  </div>
  </div>
</div>