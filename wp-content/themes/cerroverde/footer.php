<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 limite">
        <div class="foo-sec1"> <img src="<?php echo get_template_directory_uri(); ?>/img/cerro-verde-footer.png" alt="" /> <img src="<?php echo get_template_directory_uri(); ?>/img/fvm.png" alt="" /> 
          
          
          <a href="tel:+51 54 381515"><img src="<?php echo get_template_directory_uri(); ?>/img/ico-tel.png" alt="" />telf. (+51) 54 381515</a> </div>
        <div class="foo-line"></div>
      </div>



      <div class="col-md-12 footer-link">
      
      <?php
          wp_nav_menu( array( 
              'theme_location' => 'footer', 
              'container_class' => 'bottom-nav',
              'menu_id' => 'navBotton') ); 
          ?>
      </div>

    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="foo-pie">
        <div class="container">
          <div class="limite">
            <p> En Cerro Verde somos transparentes con nuestras acciones, conoce aquí sobre <br>
              <a href="/relacion-con-inversionistas/">la relación con nuestros inversionistas</a> </p>
            <strong>Copyright 2017. All rights reserved.</strong>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="search-overlay-menu"> <span class="search-overlay-close"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <i class="icon_close"></i></span>
  <form role="search" id="searchform" method="get" action="/">
    <input value="" name="s" type="search" placeholder="Buscar...">
    <button type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> </button>
  </form>
</div>
<a href="#" class="scrollup" style="display: inline;"> <i class="fa fa-angle-up"></i> </a>

<?php wp_footer(); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
</body>
</html>