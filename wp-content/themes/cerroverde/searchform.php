 <?php if ( have_posts() ) :?>
<div class="formbuscar col-md-4 col-md-offset-4">
    <form role="search" method="get" id="searchform" class="form-inline miformu" action="<?php echo home_url( '/' ); ?>">
        <div class="form-group">
          
            <input type="text" value=""  class="form-control" name="s" id="s" placeholder="" />
        </div>
            <input type="submit" id="searchsubmit" value="Buscar" class=" btn btn-default btn-buscar" />
       
    </form>
</div>
 <?php else: ?>
 <div class="formbuscar col-md-6 col-md-offset-3">
    <form role="search" method="get" id="searchform" class="form-inline miformu" action="<?php echo home_url( '/' ); ?>">
        <div class="form-group">
           
		   <label >Has una nueva busqueda</label>
		  
            <input type="text" value=""  class="form-control" name="s" id="s" placeholder="" />
        </div>
            <input type="submit" id="searchsubmit" value="Buscar" class=" btn btn-default btn-buscar" />
       
    </form>
</div>
 
 <?php endif; ?>