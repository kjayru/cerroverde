<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="description" content="Somos una operación minera de clase mundial que produce cobre y molibdeno. Operamos en Arequipa, al sur de Perú y cumplimos con los más altos estándares de seguridad, salud ocupacional, medio ambiente y calidad">
    <meta name="KEYWORDS" content="cerro verde, arequipa, desarrollo sostenible"/>		
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="generator" content="Cerro Verde">
    <meta name="author" content="Cerro Verde">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/nwmatcher-1.2.5.js"></script>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" >
		<!--[if (gte IE 6)&(lte IE 8)]>
		  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
		<![endif]-->
     <!--[if gte 8]>
    <style type="text/css">
       <link rel='stylesheet'  href='http://www.cerroverde.pe/wp-content/themes/cerroverde/vendor/css/main-ie.css' type='text/css' />
    </style>
<![endif]-->
<?php wp_head(); ?>

<link href="//fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

<!-- ANALITYCS add 20/10/17 -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108246606-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-108246606-1');
</script>

<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo  get_template_directory_uri(); ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!--facebook-->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1782514595374307',
      cookie     : true,
      xfbml      : true,
      version	 : 'v2.4'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body <?php body_class() ?>>
<header>
<?php 
function geturl($url){
	$parts = explode("/",$_SERVER['REQUEST_URI']);
	$geturl = $parts[1];
	$con_url = $url."";
	
	if($con_url===$geturl){
		 echo "active";
		}else{
	 echo "nodefault";
		}
}
function geturl2($url){
	$parts = explode("/",$_SERVER['REQUEST_URI']);
	$geturl = $parts[2];
	$con_url = $url."";
	
	if($con_url===$geturl){
		 echo "active";
		}else{
	 echo "nodefault";
		}
}
function geturl3($url){
	$parts = explode("/",$_SERVER['REQUEST_URI']);
	$geturl = $parts[3];
	$con_url = $url."";
	
	if($con_url===$geturl){
		 echo "active";
		}else{
	 echo "nodefaults";
		}
} ?>
	<div class="container" >
		<div class="row" >
            <h1><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/cerro-verde.png" alt="" /></a></h1>
            <div class="canv-btn pull-right hidden-sm hidden-md hidden-lg">

              <a href="#" class="responsive-nav" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
             <div class="c-hamburger"><span class="l-menu"></span></div>
              </a>
            </div>
            <nav>
			  <div class="extern hidden-xs">
                <ul id="navopcion" >
                  <li class="hidden-xs"><a href="/buscar" class="buscar">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/buscar-hover.png" alt="" class="bb center-block" a></a>
                    
                  </li>         
                </ul>
              </div>
            

         <?php
          wp_nav_menu( array( 
              'theme_location' => 'top', 
              'container_class' => 'menu-principal-container pull-right',
              'menu_id' => 'navPrincipal') ); 
          ?>	 

   </nav>
  </div>
</div>
</header>