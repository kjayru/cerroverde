var md = new MobileDetect(window.navigator.userAgent);
var urlpath = "http://www.cerroverde.pe/wp-content/themes/cerroverde/";
// caching selectors
    var mainWindow           = $(window),
        mainHeader           = $('header'),
        mainBody             = $('body'),
		stickyMenu           = $('#sticky'),
        mainStatus           = $('#status'),
        mainPreloader        = $('#preloader'),
        slideCarousel        = $('.slide-carousel'),
        testimonialCarousel  = $('.all-testimonial'),
        productimageCarousel = $('.all-product-image'),
        galleryPhoto         = $('.gallery-photo'),
        scrollUp             = $('.scrollup'),
		navMobile            = $('nav#mobile-nav'),
		mainhistory	 		 = $(".mainhistory"),
        mainCounter          = $('.counter');
$(document).on('ready', function(){
	'use strict';
	
	$(".sidenavtitle").click(function(){
		
		$(".panel-group").toggle("open");
	});

$(".cerrarblock").click(function(e){
		e.preventDefault();
		 $(".thumb>div").css({"opacity":"0.7"});
		$(this).parent(".mainhistory").addClass("togglemain-out").removeClass("togglemain-in").delay(350).promise().done(function(){
				$(".mainhistory").addClass("togglemain-out").removeClass("togglemain-in");
				$(".thumbnail").removeClass("abierto");	
	});
		
});

	$(".breadcrumb-container").addClass('breadcrumb');
	var ulis = $(".breadcrumb-container").children("ul").prepend('<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="http://cerroverde.pe/wp-content/themes/cerroverde/img/home.png"></a></li>');
	
	$(".slideconocenos").mightySlider({
		
      autoScale: 1,
      navigation: {
      keyboardNavBy: 'slides'
      }
    });
	
	$(".ayear").click(function(e){
		$(this).toggleClass("comboactivo");
		$("#fil01").toggleClass("mostrafiltro");
	});
	$(".ames").click(function(e){
		$(this).toggleClass("comboactivo");
		$("#fil02").toggleClass("mostrafiltro");
	});
	$(".acat").click(function(e){
		$(this).toggleClass("comboactivo");
		$("#fil03").toggleClass("mostrafiltro");
	});
	$(".aeti").click(function(e){
		$(this).toggleClass("comboactivo");
		$("#fil04").toggleClass("mostrafiltro");
	});
	
	 var $slireps = $('#slidereponsabilidad'),
                $frame = $('.frame', $slireps);

            // Calling mightySlider via jQuery proxy
   $frame.mightySlider({
      speed: 1000,
                easing: 'easeOutExpo',
                viewport: 'fill',
                
                // Navigation options
                navigation: {
                    slideSize: '100%',
                    keyboardNavBy: 'slides'
                },

                
    });
	
	
	$(".catboletin").hover(
	function(){
		$(this).children(".sombra").animate({"top":"0px"},350);
		$(this).children(".inews").children("h3").hide();
		},
	function(){
		$(this).children(".sombra").animate({"top":"-400px"},350);
		$(this).children(".inews").children("h3").show();
		}
	);
	
	
		
	
	
	$(".thumb>div").css({"opacity":"0.7"});
	
	
	
	$(".responsive-nav").click(function(e){
		e.preventDefault();
		$("#navPrincipal").toggle("in");
		$(this).toggleClass("is-active");
		});
		
	$("span.icon-arrow-down").click(function(e){
			e.preventDefault();
			
			$(this).parent("li").children(".submenu").toggle("in");
			$(this).parent("li").children(".submenu").children("li").toggleClass("subclass");
			$(this).parent("li").toggleClass("subclass");
			$(this).children("i").toggleClass("fa-angle-down");
			
			
		});
		
	$("span.mh-mn-menu-arrow").click(function(e){
			e.preventDefault();
			
			$(this).children("i").toggle("fa-angle-down").removeAttr('style');	
		});
	
	
	//flip 
	
	TweenMax.set('.medios',{
		perspective:1000
		});
	TweenMax.set($('.col_third'),{
		transformStyle:'preserve-3d',
		transformOrigin:'center center'
		});
	TweenMax.set('.col_third div',{
		backfaceVisibility:'hidden'
		});
	TweenMax.set('.back',{
		rotationY:-180
		});

	
	

	var flipped2=false;
	$('.hover .panel').hover(function(){
		
			TweenMax.to($(this),1,{
				rotationY:180,
				onComplete:function(){
					flipped2=true;
					}
				});
	  },function(){
			TweenMax.to($(this),1,{
				rotationY:0,
				onComplete:function(){
					flipped2=false;
					}
				});
			
		});
	
	
	if(md.mobile()){	
	//MOVIL FUNCTIONS
		$(".hover").mousedown(function(){
			$(this).addClass('flip');
		});
		$(".hover").mouseleave(function(){
			$(this).removeClass('flip');
		});
	  
	  $(document).on("click",".threeLevelPagesTree .sidenavtitle .mh-mn-menu-arrow",function(e){
		  e.stopPropagation();
		  e.preventDefault();
		  });
      
	  $(document).on("click",".historias .thummov",function(e){
		e.stopPropagation();
		e.preventDefault();
		
		var ids = $(this).parent("div").data("id");
		var atr = $(this).children("div").children("a").attr("id");
		
		
		//togglemain-in
		var itom = atr.split("-");
		var generado = ".resamp-"+itom[1];
		var describe = $(this).children("div").children("a").data("describe");
		var pimagen =  $(this).children("div").children("a").data("imagen");
		
		$(generado).children(".mainhistory").toggleClass("togglemain-in").removeClass("togglemain-out");
		
		$(generado).children(".mainhistory").children("p").html(describe);
		$(generado).children(".mainhistory").children(".fotohistory").children("img").attr("src",pimagen);
	});
	
	
	
	}
	else{
		//FUNCIONES DESKTOP
		$(".hover").mouseover(function(){
		$(this).addClass('flip');
		});
		$(".hover").mouseleave(function(){
			$(this).removeClass('flip');
		});
		var headerHeight = $('header').outerHeight(true); 
		var footerHeight = $('footer').innerHeight();

	$('.bs-docs-sidebar').affix({
		  offset: {
				top: headerHeight,
				bottom:footerHeight
			  }
	}).on('affix.bs.affix', function () { 
		
			$(this).css({
				'top': $('.bs-docs-sidebar').height(),    
				'width': $(this).outerWidth()  
			});
		}).on('affix-bottom.bs.affix', function () { 
		
			$(this).css('bottom', 'auto'); 
		});
				
		$('header').affix({
			  offset: {
					top: $('header').height()
					
				  }
		});
		$(".responsive-nav").click(function(){
			$(this).toggleClass("is-active");
		});
		// - Animación del menu lateral
		$('.menu-lateral > div > strong').on('click', function(){
			var div = $(this).parent().find('div'),
				h = div.find('ul').outerHeight();
			if(div.hasClass('act')){
				div.css('height',0).removeClass('act');
			} else {
				$('.menu-lateral > div > div.act').css('height',0);
				div.css('height',h).addClass('act');
			}
		});
		$('#navPrincipal li')
		.stop().on('mouseenter', function(){
			navHover($(this));		
		})
		.stop().on('mouseleave', function(){
			navHoverLeave($(this));		
		});   
	
	$(document).on("click",".historias .thumbnail",function(e){
		e.preventDefault();
		var describe = $(this).data("describe");
		var p_imagen = $(this).data("imagen");
	
		$(".mainhistory .descripcion").html(describe);
		$(".mainhistory .fotohistory img").attr("src",p_imagen);
		$(".thumb>div").css({"opacity":"0.7"});
		$(this).parent("div").css({"opacity":"1"});
		  var minumero = $(this).attr("id");
		  var micanva="";
		   var c = minumero.split("-");
			if(c[1]>0){
				
				 micanva = "#num-1";
				} 
			if(c[1]>3){
				
				 micanva = "#num-2";
				} 
			 if(c[1]>6){
				
				 micanva = "#num-3";
				}
			if(c[1]>9){
				 micanva = "#num-4";
				} 
			if(c[1]>12){
				 micanva = "#num-5";
				} 
			if(c[1]>15){
				 micanva = "#num-6";
				} 
			if(c[1]>18){
				 micanva = "#num-7";
				} 
			if(c[1]>21){
				 micanva = "#num-8";
				} 
			if(c[1]>24){
				 micanva = "#num-9";
				} 
			if(c[1]>27){
				 micanva = "#num-10";
				} 
			if(c[1]>30){
				 micanva = "#num-11";
				} 
		    if($(".thumbnail").hasClass("abierto")){
				
				
				$(".thumbnail").removeClass("abierto");
				
				$(".mainhistory").addClass("togglemain-out").removeClass("togglemain-in").delay(350).promise().done(function(){ 
					 $(micanva).addClass("togglemain-in").removeClass("togglemain-out"); 
					 $(".thumbnail").addClass("abierto");
				});	 
			}else{
			  
			  $(micanva).addClass("togglemain-in").removeClass("togglemain-out"); 	
			  $(this).addClass("abierto");
			}	
	});
	
    $(document).on("click",".historias .abierto",function(e){
	   e.preventDefault();
	   $(".thumb>div").css({"opacity":"0.7"});
	   $(this).parent("div").css({"opacity":"1"});
	   var minumero = $(this).attr("id");
	    var c = minumero.split("-");
		
		//calculogrilla(c[1]);
	    var micanva;
			if(c[1]>0){
				
				 micanva = "#num-1";
				} 
			if(c[1]>3){
				
				 micanva = "#num-2";
				} 
			 if(c[1]>6){
				
				 micanva = "#num-3";
				}
			if(c[1]>9){
				 micanva = "#num-4";
				} 
			if(c[1]>12){
				 micanva = "#num-5";
				} 
			if(c[1]>15){
				 micanva = "#num-6";
				} 
			if(c[1]>18){
				 micanva = "#num-7";
				} 
			if(c[1]>21){
				 micanva = "#num-8";
				} 
			if(c[1]>24){
				 micanva = "#num-9";
				} 
			if(c[1]>27){
				 micanva = "#num-10";
				} 
			if(c[1]>30){
				 micanva = "#num-11";
				} 
	   
	   $(micanva).addClass("togglemain-out").removeClass("togglemain-in"); 
	   $(this).removeClass("abierto");	
	});
	
	
	
	
}
	if(md.is('iPhone')){
		 $(document).on("click",".historias .thummov",function(e){
		e.stopPropagation();
		e.preventDefault();
		
		var ids = $(this).parent("div").data("id");
		var atr = $(this).children("div").children("a").attr("id");
		
		
		//togglemain-in
		var itom = atr.split("-");
		var generado = ".resamp-"+itom[1];
		var describe = $(this).children("div").children("a").data("describe");
		var pimagen =  $(this).children("div").children("a").data("imagen");
		
		$(generado).children(".mainhistory").toggleClass("togglemain-in").removeClass("togglemain-out");
		
		$(generado).children(".mainhistory").children("p").html(describe);
		$(generado).children(".mainhistory").children(".fotohistory").children("img").attr("src",pimagen);
	});
	}

	
     var $slideconoce = $('#slideconoce'),
    	 $framex = $('.frame', $slideconoce);

     var $slidedesarrollo = $('#slidedesarrollo'),
    	 $frame2 = $('.frame2', $slidedesarrollo);

	var $slidecirculo = $('#slidecirculo'),
    	 $frame3 = $('.frame3', $slidecirculo);
		 
         
            $framex.mightySlider({
                speed: 1000,
                easing: 'easeOutExpo',
                viewport: 'fill',
                
                // Navigation options
                navigation: {
                    slideSize: '100%',
                    keyboardNavBy: 'slides'
                },

                // Dragging options
                dragging: {
                    swingSpeed:    0.1
                },

                // Pages options
                pages: {
                    activateOn: 'click'
                },

                // Commands options
                commands: {
                    pages: 1,
                    buttons: 1
                }
            });


 		$frame2.mightySlider({
                speed: 1000,
                easing: 'easeOutExpo',
                viewport: 'fill',
                
                // Navigation options
                navigation: {
                    slideSize: '100%',
                    keyboardNavBy: 'slides'
                },

                // Dragging options
                dragging: {
                    swingSpeed:    0.1
                },

                // Pages options
                pages: {
                    activateOn: 'click'
                },

                // Commands options
                commands: {
                    pages: 1,
                    buttons: 1
                }
            });
			
			$frame3.mightySlider({
                speed: 1000,
                easing: 'easeOutExpo',
                viewport: 'fill',
                
                // Navigation options
                navigation: {
                    slideSize: '100%',
                    keyboardNavBy: 'slides'
                },

                
            });

	$(".mSButtons").hide();
	
	$(".search-overlay-close").click(function(e){
		e.preventDefault();
		$(".search-overlay-menu").removeClass("open");
	});

	$(".buscar").click(function(e){
		e.preventDefault();
		$(".search-overlay-menu").addClass("open");
	});
	$(".buscarmovil").click(function(e){
		e.preventDefault();
		$(".search-overlay-menu").addClass("open");
	});
	
	

	// - Rotador generico
	if($('.rotador-padre').length){
		var swiper = new Swiper('.rotador-padre', {
			slidesPerView: 1,
			paginationClickable: true,
			loop: true,
			pagination: '.swiper-pagination',
			autoplay: 4500,
			autoplayDisableOnInteraction: true,
			speed: 1500,
			onTransitionEnd : function(){
				$('.rotador-unidad .limite').fadeIn(350);
			},
			onTransitionStart : function(){
				$('.rotador-unidad .limite').fadeOut(250);
			}
		});
	}

		// - Rotador circulos
	

	//if($('.list-posts').length){
		var swiper = new Swiper('.list-posts', {
			slidesPerView: 3,
			paginationClickable: true,
			loop: true,
			autoplay: 3000,
			autoplayDisableOnInteraction: false,
			speed: 1000,
			spaceBetween: 0,
			nextButton: '.box-posts .next',
        	prevButton: '.box-posts .prev',
        	breakpoints: {
			    // when window width is <= 320px
			    320: {
			      slidesPerView: 1,
			      spaceBetween: 10,
			      
			    },
			    // when window width is <= 480px
			    480: {
			      slidesPerView: 1,
			      spaceBetween: 10,
			      
			    },
			    // when window width is <= 640px
			    640: {
			      slidesPerView: 2,
			      spaceBetween: 20,
			     
			    },
			     767: {
			      slidesPerView: 2,
			      spaceBetween: 20,
			     
			    },
			    1024: {
			      slidesPerView: 4,
			      spaceBetween: 20,
			      
			    }
			  }
		});
	//}

	if($('.circulos').length){
		var swiper = new Swiper('.circulos', {
			slidesPerView: 3,
			paginationClickable: true,
			loop: true,
			autoplay: 3000,
			autoplayDisableOnInteraction: true,
			speed: 1000,
			spaceBetween: 0,
			nextButton: '.nextCirculo',
        	prevButton: '.prevCirculo',
        	breakpoints: {
			    // when window width is <= 320px
			    320: {
			      slidesPerView: 1,
			      spaceBetween: 10
			    },
			    // when window width is <= 480px
			    480: {
			      slidesPerView: 1,
			      spaceBetween: 10
			    },
			    // when window width is <= 640px
			    640: {
			      slidesPerView: 2,
			      spaceBetween: 20
			    }
			  }
		});
	}
  
$(window).resize();	

// Scroll to Top
        mainWindow.on("scroll", function() {
            if ($(this).scrollTop() > 98){  
                mainHeader.addClass("sticky");
                mainBody.addClass("sticky");
                scrollUp.show();
            }
            else{
                mainHeader.removeClass("sticky");
                mainBody.addClass("sticky");
                scrollUp.hide();
            }
        });

        // Click event to scroll to top
        scrollUp.on("click", function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
	$(window).bind('load', function () {
		parallaxInit();						  
	});
	  function parallaxInit() {
		testMobile = isMobile.any();
		if (testMobile == null)
		{
			$('.image1').parallax("50%", 0.5);
			$('.image2').parallax("50%", 0.5);
			$('.image3').parallax("50%", 0.5);
			$('.image4').parallax("50%", 0.5);
			$('.parallax').parallax("-50%", 0.3);
			$('.parallax1').parallax("50%", 0.5);
			$('.parallax2').parallax("50%", 0.5);
			$('.parallax3').parallax("50%", 0.5);
			$('.parallax4').parallax("50%", 0.5);
			$('.parallax5').parallax("50%", 0.5);
			$('.parallax6').parallax("50%", 0.5);
		}
	}	
	  parallaxInit();
	

	$(".cerrarblock").click(function(e){
		e.preventDefault();
		 $(".thumb>div").css({"opacity":"0.7"});
		$(this).parent(".mainhistory").addClass("togglemain-out").removeClass("togglemain-in").delay(350).promise().done(function(){
				$(".mainhistory").addClass("togglemain-out").removeClass("togglemain-in");
				$(".thumbnail").removeClass("abierto");	
	     });	
  });
	
	
	$(".nombre-cat").hover(
		function(){
			$(this).children("span").fadeOut(100,"swing",function(){
					$(this).parent("a").children(".sombra-cat").animate({"right":"0"},350,"swing");
				});
			
			
			},
		function(){
			$(this).children(".sombra-cat").animate({"right":"-400px"},350,"swing",function(){
				
				$(this).parent("a").children("span").fadeIn(100,"swing");
				});
			}
		
		);
	
	$(".slide_element li").hover(
	function(){
		$(this).children(".backface").animate({"top":"0px"},360,"easeInQuad");
		$(this).children(".details").fadeOut(350);
		},
	function(){
		$(this).children(".backface").animate({"top":"-400px"},360,"easeInQuad");
		$(this).children(".details").fadeIn(350);
		});
	
	
	var $win = $(".interna"),
            isTouch = !!('ontouchstart' in window),
            clickEvent = isTouch ? 'tap' : 'click';

    function calculator(width){
                var percent = '25%';
                if (width <= 480) {
                    percent = '100%';
                }
                else if (width <= 768) {
                    percent = '50%';
                }
                else if (width <= 980) {
                    percent = '33.33%';
                }
                return percent;
            };
	
            var $carousel = $('#simple'),
                $pagesbar = $('.mSPages', $carousel),
                $frame = $('.frame', $carousel);

});



var html="";
var j=1;
var k=1;

$(document).ready(function(){
	///contamos box
	var ancho = $(window).width();
	var numelementos = parseInt($(".historias .thumb").length);
	var total_elemento = numelementos - 1;
	
	if(ancho<769){
	
	  $(".historias .thumb").each(function(index, element) {  
	  
	     $(this).addClass("thummov");     
		if (index%1==0) 
		{ 
			  if(index>0){
			  
				var under = j-1;
				
			   $(this).before('<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'" data-id="'+under+'"><div class="mainhistory togglemain-out" id="num-'+under+'"><a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a><p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado. Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p><div class="fotohistory"><img src="img/tajo.png" class="img-reponsive"/></div> </div>');
			  }
		  
			  
		   j++; 
		 } 
		 if (index === total_elemento) {
				 var underf = j-1;
				 
				html=html+'<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+underf+'">';
				html=html+'<div class="mainhistory togglemain-out" id="num-'+underf+'">';
				html=html+'<a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a>';
				html=html+'<p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado.';
				html=html+'Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p>';
				html=html+'<div class="fotohistory">';
				html=html+'<img src="img/tajo.png" class="img-reponsive"/>';
				html=html+'</div> </div>';
				$(this).after(html);
				  
		 }
      });
	}
	
	if(ancho<992 && ancho>679){
		
		$(".historias-alterna .thumb").each(function(index, element) {       
		if (index%2==0) 
		{ 
			  if(index>0){
			  
				var under = j-1;
				
			   $(this).before('<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'"><div class="mainhistory togglemain-out" id="num-'+under+'"><a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a><p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado. Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p><div class="fotohistory"><img src="img/tajo.png" class="img-reponsive"/></div> </div>');
			  }
		  
			  
		   j++; 
		 } 
		 if (index === total_elemento) {
				 var underf = j-1;
				 
				html=html+'<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'">';
				html=html+'<div class="mainhistory togglemain-out" id="num-'+underf+'">';
				html=html+'<a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a>';
				html=html+'<p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado.';
				html=html+'Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p>';
				html=html+'<div class="fotohistory">';
				html=html+'<img src="img/tajo.png" class="img-reponsive"/>';
				html=html+'</div> </div>';
				$(this).after(html);
				  
		 }
      });
	}
	if(ancho>992){
	
		
		$(".historias .thumb").each(function(index, element) {
       	 console.log(total_elemento+" "+index);
		if (index%3==0) 
		{ 
			  if(index>0){
			  
				var under = j-1;
				
			   $(this).before('<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'"><div class="mainhistory togglemain-out" id="num-'+under+'"><a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a><p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado. Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p><div class="fotohistory"><img src="img/tajo.png" class="img-reponsive"/></div> </div>');
			  }
		  
			  
		   j++; 
		 } 
		
		 if (index === total_elemento) {
				 var underf = j-1;
			
				html=html+'<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'">';
				html=html+'<div class="mainhistory togglemain-out" id="num-'+underf+'">';
				html=html+'<a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a>';
				html=html+'<p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado.';
				html=html+'Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p>';
				html=html+'<div class="fotohistory">';
				html=html+'<img src="img/tajo.png" class="img-reponsive"/>';
				html=html+'</div> </div>';
				$(this).after(html);	  
		 }
		
      }); 
	}
});
// - Animación con el evento mousenter en los <a> del header
function navHover(key){
	var t = key,
		init = 0,
		ul = t.find('ul'),
		li = ul.find('li').length-1,
		anim = '',
		h = 0;
		ul.find('li').removeClass('view');
		$.each(ul.find('li'), function(index, val) { h+=$(this).outerHeight() });
		key.find('ul').css('height',h);
		anim = setInterval(function(){
			ul.find('li').eq(init).addClass('view');
			(init<=li) ? init++ : clearInterval(anim);
		},80);
}

// - Animación con el evento mouseleave en los <a> del header
function navHoverLeave(key){
	var t = key,
		ul = t.find('ul');
		ul.find('li').removeClass('view');
		ul.css('height',0);
}

 //Mobile Detect
var testMobile;
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

