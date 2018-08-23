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

$args=array(
			'suppress_filters' => false,
              'post_type'=>'media_post',
              'post_status' => 'publish',
              'numberposts'=>'50',
			   'category_name'=>'prensa',
              'orderby'=>'post_date',
              'post_parent'=>0,
              'order'=>'DESC'
		  );
		  $prensas = get_posts($args);
	$year = array();	  
	$mes  = array();	  
		  foreach($prensas as $prensa): 
			     $year[] = get_field('year',$prensa->ID);
				 $mes[] = get_field('mes',$prensa->ID);	

				$meses[] = get_field('mes',$prensa->ID)."-".get_field('year',$prensa->ID);	
		  endforeach;
		
?>
<div class="col-md-12">
<div class="childrenPagesTreeThirdLevel parbase threeLevelPagesTree hidden-sm hidden-md hidden-lg">
   	    <div class="threeLevelPagesTree">
		  <div class="sidenavtitle">Filtros<span class="mh-mn-menu-arrow icon-arrow-down"></span>
          
        </div>
   	 </div>
   </div>
<?php //wp_get_archives();  ?>
<a href="#" class="uenlace ayear"><span>AÑO</span></a>
 <div class="byear">
 	<div class="combos" id="fil01">
    	
       <ul>
        <?php 
		$years = intval(date("Y"));
		for($i= $years;$i> 2000; $i--){
			
			if(in_array($i,$year)):
			?>
        	<li><a href="#" class="ui-year" data-meses='<?php echo json_encode($meses);?>' data-tipo="year" data-var="<?php echo $i; ?>" data-seccion="noticias"><?php echo $i; ?></a></li>
         <?php 
		 
		 	endif;
		 } ?>  
        </ul>
    
    </div>
    
 </div>
 <a href="#" class="uenlace ames" style="display:none;"><span>MES</span></a>
 <div class="mes">
 	<div class="combos" id="fil02">
    
    	<ul>
        	<li ><a href="#" class="ui-mes" data-tipo="mes" data-var="1" data-seccion="noticias">Enero</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="2" data-seccion="noticias">Febrero</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="3" data-seccion="noticias">Marzo</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="4" data-seccion="noticias">Abril</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="5" data-seccion="noticias">Mayo</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="6" data-seccion="noticias">Junio</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="7" data-seccion="noticias">Julio</a></li>
            <li><a href="#" class="ui-mes" data-tipo="mes" data-var="8" data-seccion="noticias">Agosto</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="9" data-seccion="noticias">Setiembre</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="10" data-seccion="noticias">Octubre</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="11" data-seccion="noticias">Noviembre</a></li>
            <li ><a href="#" class="ui-mes" data-tipo="mes" data-var="12" data-seccion="noticias">Diciembre</a></li>
        </ul>
    
    </div>
 	
 </div>
 <!--
 <a href="#" class="uenlace aeti"><span>ETIQUETAS</span></a>
 <div class="etiquetas">
 	 <div class="combos" id="fil04">
    	
         <?php
		  $args = array('format'=>'list','smallest'=>'9.5','largest'=>'9.5','unit'=>'px');
		  wp_tag_cloud($args); ?>
       
    </div>

</div>
-->	
</div>
