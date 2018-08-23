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

<div>
  <div class="filtro">FILTRAR POR:</div>
</div>

<a href="#" class="uenlace ayear"><span>AÑO</span></a>
 <div class="ayear">
 	<div class="combos" id="fil01">
    	<ul>
        <?php 
		$years = intval(date("Y"));
		for($i= $years;$i> 2000; $i--){
			
			?>
        	<li><a href="#" class="ui" data-tipo="year" data-var="<?php echo $i; ?>" data-seccion="fotos"><?php echo $i; ?></a></li>
         <?php } ?>  
        </ul>
    
    </div>
    
 </div>
 <a href="#" class="uenlace ames"><span>MES</span></a>
 <div class="mes">
 	<div class="combos" id="fil02">
    	<ul>
        	<li><a href="#" class="ui" data-tipo="mes" data-var="1" data-seccion="fotos">Enero</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="2" data-seccion="fotos">Febrero</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="3" data-seccion="fotos">Marzo</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="4" data-seccion="fotos">Abril</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="5" data-seccion="fotos">Mayo</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="6" data-seccion="fotos">Junio</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="7" data-seccion="fotos">Julio</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="8" data-seccion="fotos">Agosto</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="9" data-seccion="fotos">Setiembre</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="10" data-seccion="fotos">Octubre</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="11" data-seccion="fotos">Noviembre</a></li>
            <li><a href="#" class="ui" data-tipo="mes" data-var="12" data-seccion="fotos">Diciembre</a></li>
        </ul>
    
    </div>
 	
 </div>
 
 <a href="#" class="uenlace aeti"><span>ETIQUETAS</span></a>
 <div class="etiquetas">
 	 <div class="combos" id="fil04">
    	
         <?php
		  $args = array('format'=>'list','link'=>'','smallest'=>'9.5','largest'=>'9.5','unit'=>'px');
		  wp_tag_cloud($args); ?>
       
    </div>
	
</div>
