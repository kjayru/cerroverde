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



<ul class="nav nav-list hidden-xs docside"> 

    <li class="nav-header">Abastecimientos</li>   

   <li><a href="/abastecimientos/condiciones-curso-tecsup" class="<?php geturl3("condiciones-curso-tectup"); ?>">Condiciones curso TECSUP</a></li> 

  <li><a href="/abastecimientos/manual-usuario-tecsup" class="<?php geturl3("manual-usuario-tecsup"); ?>"> Manual usuario TECSUP</a></li>

  
  <li><a href="/compras/manual-de-procedimiento-y-estandares-sso" class="<?php geturl3("manual-de-procedimiento-y-estandares-sso"); ?>">Manual de Procedimiento y estandares SSO</a> </li>

  <li><a href="/compras/procedimiento-sctr" class="<?php geturl3("procedimiento-sctr"); ?>">Procedimiento SCTR</a> </li>

</ul>



<div class="parsys hidden-sm hidden-md hidden-lg">

 <div class="container">

  <div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree">

   <div class="threeLevelPagesTree">



	<div class="sidenavtitle">Saltar sección<div class="mh-mn-menu-arrow icon-arrow-down"><i class="fa fa-angle-right" aria-hidden="true"></i></div></div>

        <div class="panel-group docside" id="sidenav">

            <h4 class="root-page-panel"> 

                <a href="/abastecimientos" class="collapsed">Contratos</a>

            </h4>
                  <div class="panel panel-default">

                           <div class="panel-heading">

                             <h4 class="panel-title">

                                 <a href="/abastecimientos/condiciones-curso-tecsup" class="collapsed">Condiciones curso TECSUP</a>

                             </h4>

                           </div>
                           
                            <div class="panel-heading">

                             <h4 class="panel-title">

                                 <a href="/abastecimientos/manual-usuario-tecsup" class="collapsed">Manual usuario TECSUP</a>

                             </h4>

                           </div>

                           <div class="panel-heading">

                             <h4 class="panel-title">

                                 <a href="/abastecimientos/manual-de-procedimiento-y-estandares-sso" class="collapsed">Manual de Procedimiento y estandares SSO</a>

                             </h4>

                           </div>

                           

                           <div class="panel-heading">

                             <h4 class="panel-title">

                                 <a href="/abastecimientos/procedimiento-sctr" class="collapsed">Procedimiento SCTR</a>

                             </h4>

                           </div>

                  </div>

        </div>

	 </div>

  </div>

  </div>

</div>