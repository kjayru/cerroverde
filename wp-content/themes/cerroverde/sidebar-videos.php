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
        	<li><a href="#" class="ui">2017</a></li>
            <li><a href="#" class="ui">2017</a></li>
            <li><a href="#" class="ui">2017</a></li>
            <li><a href="#" class="ui">2017</a></li>
            <li><a href="#" class="ui">2017</a></li>
            <li><a href="#" class="ui">2017</a></li>
            <li><a href="#" class="ui">2017</a></li>
        </ul>
    
    </div>
    <select name="fyear" id="selector1" style="display:none;">
      <option value="#">2000</option>
      <option value="#">2001</option>
      <option value="#">2002</option>
    </select>
 </div>
 <a href="#" class="uenlace ames"><span>MES</span></a>
 <div class="mes">
 	<div class="combos" id="fil02">
    	<ul>
        	<li><a href="#" class="ui">Enero</a></li>
            <li><a href="#" class="ui">Febrero</a></li>
            <li><a href="#" class="ui">Marzo</a></li>
            <li><a href="#" class="ui">Abril</a></li>
            <li><a href="#" class="ui">Mayo</a></li>
            <li><a href="#" class="ui">Junio</a></li>
            <li><a href="#" class="ui">Julio</a></li>
        </ul>
    
    </div>
 	<select name="fmes" id="selector2" style="display:none;">
      <option value="#">Enero</option>
      <option value="#">Febrero</option>
      <option value="#">Marzo</option>
    </select>
 </div>
 <a href="#" class="uenlace acat"><span>CATEGORIA</span></a>
 <div class="categoria">
 	<div class="combos" id="fil03">
    	<ul>
        	<li><a href="#" class="ui">categoria 1</a></li>
            <li><a href="#" class="ui">categoria 2</a></li>
            <li><a href="#" class="ui">categoria 3</a></li>
            <li><a href="#" class="ui">categoria 4</a></li>
            <li><a href="#" class="ui">categoria 5</a></li>
            <li><a href="#" class="ui">categoria 6</a></li>
            <li><a href="#" class="ui">categoria 7</a></li>
        </ul>
    
    </div>
 	<select name="fcategoria" id="selector3" style="display:none;">
      <option value="#">Categoria 1</option>
      <option value="#">Categoria 2</option>
      <option value="#">Categoria 3</option>
    </select>
 </div>
 <a href="#" class="uenlace aeti"><span>ETIQUETAS</span></a>
 <div class="etiquetas">
 	 <div class="combos" id="fil04">
    	<ul>
        	<li><a href="#" class="ui">Etiqueta 1</a></li>
            <li><a href="#" class="ui">Etiqueta 2</a></li>
            <li><a href="#" class="ui">Etiqueta 3</a></li>
            <li><a href="#" class="ui">Etiqueta 4</a></li>
            <li><a href="#" class="ui">Etiqueta 5</a></li>
            <li><a href="#" class="ui">Etiqueta 6</a></li>
            <li><a href="#" class="ui">Etiqueta 7</a></li>
        </ul>
    
    </div>
	<select name="fetiqueta" id="selector4" style="display:none;">
      <option value="#">Etiqueta 1</option>
      <option value="#">Etiqueta 2</option>
      <option value="#">Etiqueta 3</option>
    </select>
</div>
