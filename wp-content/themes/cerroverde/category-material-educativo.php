<?php 
get_header();
?>
<div class="container hidden-xs">
	<div class="row">
    <style type="text/css">				
		.breadcrumb-container {
		  font-size:   !important;
		}
		
		.breadcrumb-container li a{
		  color:   !important;
		  font-size:   !important;
		  line-height:   !important;
		}
		
		.breadcrumb-container li .separator {
		  color:   !important;
		  font-size:   !important;
		}										
		.breadcrumb-container.theme1 li {
			margin: 0;
			padding: 0;
		}													
		.breadcrumb-container.theme1 a {
			background: ;
			display: inline-block;
			margin: 0 5px;
			padding: 5px 10px;
			text-decoration: none;
		}
</style>
<div class="breadcrumb-container theme1 breadcrumb" itemprop="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList"><ul itemtype="http://schema.org/BreadcrumbList" itemscope=""><li><span class="separator">/</span><a href="#">Media</a></li><li><span class="separator">/</span><a title="Noticias" href="http://devcerroverde.mediacontacts-app.com/category/media/noticias/">Publicaciones</a><span class="separator">/</span></li></ul></div></div>

</div>
<section>
  <div class="container">
    	<!-- SIDEBAR -->
		<div class="row">
			<div class=" col-lg-3 col-sm-3 col-md-3">
				<div class="row">
                <div class="sidebar-nav bs-docs-sidebar">
					<?php 
                    get_sidebar('publicaciones');
                    ?>
				</div>
                </div>
			</div>
    <!-- CONTENT -->     
	<div class="col-lg-9 col-sm-9 col-md-9">
         <!-- loop implementation-->
     			<h1>brochure</h1>
            <!-- end content-->
            </div>   
        </div>
  </div>
</section> 
<?php 
  get_footer();
  ?>