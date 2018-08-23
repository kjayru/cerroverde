var md = new MobileDetect(window.navigator.userAgent);
var urlpath = "https://www.cerroverde.pe/wp-content/themes/cerroverde";
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

$('.js-timeline').Timeline();

try{
	var switrata = new Swiper('.slide-tratamiento', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.opright',
        prevButton: '.opleft',
        spaceBetween: 30,
		effect:'slide',
		 on: {
			init: function () {
			 // console.log('swiper initialized');
			},
		  },
    });
	
	switrata.init();
	
}catch(err){
	//console.log("no inicializado");
	}
	
$(".sharedbox").hover(
	function(){
		$(".sbox2").stop().animate({"top":"70px"},350,"swing",function(){
			   $(".sbox3").stop().animate({"top":"140px"},350,"swing",function(){
					   $(".sbox4").stop().animate({"top":"210px"},350,"swing");
					});
			});
		},
	function(){
		$(".sbox4").stop().animate({"top":"0px"},350,"swing",function(){
			$(".sbox3").stop().animate({"top":"0px"},350,"swing",function(){
					$(".sbox2").stop().animate({"top":"0px"},350,"swing");
			});
		});
		}
	);
	
		
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
	var ulis = $(".breadcrumb-container").children("ul").prepend('<li class="breadcrumb-item"><a href="/" class="breadhome"> <img src="https://cerroverde.pe/wp-content/themes/cerroverde/img/home.png"></a></li>');
	
	$(".slideconocenos").mightySlider({
		
      autoScale: 1,
      navigation: {
      keyboardNavBy: 'slides'
      }
    });
	
	$(".ayear").click(function(e){
		e.preventDefault();
		$(this).toggleClass("comboactivo");
		$("#fil01").toggleClass("mostrafiltro");
	});
	$(".ames").click(function(e){
		e.preventDefault();
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
	
	$(".ui").click(function(e){
	e.preventDefault();
	var tipo = $(this).data("tipo");
	var dato = $(this).data("var");
	var seccion = $(this).data("seccion");
	
	if(tipo=="year"){
		window.location.href="/category/media/"+seccion+"/?data=year&var="+dato;
		}
	if(tipo=="mes"){
		window.location.href="/category/media/"+seccion+"/?data=mes&var="+dato;
		}
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
	
	
CSSPlugin.defaultTransformPerspective = 1000;

//we set the backface 
TweenMax.set($(".back"), {rotationY:-180});

$.each($(".panel"), function(i,element) {
  
	var frontCard = $(this).children(".front"),
      backCard = $(this).children(".back"),
      tl = new TimelineMax({paused:true});
	
	tl
		.to(frontCard, 1, {rotationY:180})
		.to(backCard, 1, {rotationY:0},0)
		.to(element, .5, {z:50},0)
		.to(element, .5, {z:0},.5);
	
	element.animation = tl;
  
});

$(".panel").hover(elOver, elOut);

function elOver() {
    this.animation.play();
}

function elOut() {
    this.animation.reverse();
}

	
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

	/*$('.bs-docs-sidebar').affix({
		  offset: {
				top: 0,
				bottom:540
			  }
	}).on('affix.bs.affix', function () { 
		
			$(this).css({
				'top': 0,  
				'width': $(this).outerWidth()  
			});
		}).on('affix-bottom.bs.affix', function () { 
		
			$(this).css('bottom', 'auto'); 
		});
				
		$('header').affix({
			  offset: {
					top: 81
					
				  }
		});*/
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
		$(".mainhistory .fotohistory").html("");
		var describe = $(this).data("describe");
		//console.log("devento");
		var p_imagen = $(this).data("imagen");
		//console.log(describe);
		$(".mainhistory p").html(describe);
		$(".mainhistory .fotohistory").html('<img src="'+p_imagen+'" class="img-responsive center-block">');
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
			if(c[1]>33){
				 micanva = "#num-12";
				} 
			if(c[1]>36){
				 micanva = "#num-13";
				} 
			if(c[1]>39){
				 micanva = "#num-14";
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
			if(c[1]>33){
				 micanva = "#num-12";
				} 
			if(c[1]>36){
				 micanva = "#num-13";
				} 
			if(c[1]>39){
				 micanva = "#num-14";
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
			//loop: true,
			pagination: '.swiper-pagination',
			//autoplay: 4500,
			//autoplayDisableOnInteraction: true,
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
		var swiper_a = new Swiper('.list-posts', {
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
		$(".scrollup").hide();						  
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


var swiper2 = new Swiper('.noticias-swiper', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30
    });



});


$(window).load(function(){
	var url_encode = encodeURI(window.location.href);
	var titulo_post = $(".share-twitter").data("title");
	var url_twitter = 'https://twitter.com/share?url='+url_encode+'&via=cerroverde&related=twitterapi%2Ctwitter&text='+encodeURI(titulo_post)+'';
	
	$(".share-twitter").attr("href",url_twitter);			
	 
	
	var url_google ='https://plus.google.com/share?url='+url_encode+'';
	$(".share-google").attr("href",url_google);
	 
	try{

		$(".stack1").click(function(e){
			e.preventDefault();
			var stack1 = $("#istack1").position().top;
			//console.log("click stack");
			 $("html, body").animate({ scrollTop: stack1+20 }, 600,"swing");
		});
		
		$(".stack2").click(function(e){
			e.preventDefault();
			var stack2 = $("#istack2").position().top;
			 $("html, body").animate({ scrollTop: stack2+20 }, 600,"swing");
		});
		$(".stack3").click(function(e){
			e.preventDefault();
			var stack3 = $("#istack3").position().top;
			 $("html, body").animate({ scrollTop: stack3+20 }, 600,"swing");
		});
		$(".stack4").click(function(e){
			e.preventDefault();
			var stack4 = $("#istack4").position().top;
			 $("html, body").animate({ scrollTop: stack4+20 }, 600,"swing");
		});
	}catch(err){
		//console.log("no inicializado "+err);
	}	
});


$(window).resize(function(){
	// console.log("resize");
	var swiper_c = new Swiper('.circulos', {
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
			680: {
			  slidesPerView: 1,
			  spaceBetween: 20
			}
		  }
	});
 });


//comparte redes
var url_encode = encodeURI(window.location.href);

$(".share-facebook").click(function(e){		
	'use strict';
	e.preventDefault();
	//var uf = $(this).attr("href");
 console.log('inicializando');
 FB.ui(
  {
    method: 'share',
    href: window.location.href,
  },
  // callback
  function(response) {
    if (response && !response.error_message) {
    //  console.log('Posting completed.');
    } else {
   //   console.log('Error while posting.');
    }
  }
);

});



var html="";
var j=1;
var k=1;

$(document).ready(function(){
	//down rows

	
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
				
			   $(this).before('<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'" data-id="'+under+'"><div class="mainhistory togglemain-out" id="num-'+under+'"><a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a><p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado. Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p><div class="fotohistory"><img src="'+urlpath+'/img/tajo.png" class="img-reponsive"/></div> </div>');
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
				html=html+'<img src="'+urlpath+'/img/tajo.png" class="img-reponsive"/>';
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
				
			   $(this).before('<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'"><div class="mainhistory togglemain-out" id="num-'+under+'"><a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a><p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado. Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p><div class="fotohistory"><img src="'+urlpath+'/img/tajo.png" class="img-reponsive"/></div> </div>');
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
				html=html+'<img src="'+urlpath+'/img/tajo.png" class="img-reponsive"/>';
				html=html+'</div> </div>';
				$(this).after(html);
				  
		 }
      });
	}
	if(ancho>992){
	
		
		$(".historias .thumb").each(function(index, element) {
       //	 console.log(total_elemento+" "+index);
		if (index%3==0) 
		{ 
			  if(index>0){
			  
				var under = j-1;
				
			   $(this).before('<div class="col-md-12 col-sm-12 col-xs-12 resamp-'+under+'"><div class="mainhistory togglemain-out" id="num-'+under+'"><a class="cerrarblock" href="#"><img src="'+urlpath+'/img/btn-cancel.png"/></a><p>Los incas y colonizadores españoles realizaron actividades de minería artesanal de óxido de alto grado. Los hermanos Vicuña reportaron varios miles de toneladas de óxdiso que fueron enviados a Gales.</p><div class="fotohistory"><img src="'+urlpath+'/img/tajo.png" class="img-reponsive"/></div> </div>');
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
				html=html+'<img src="'+urlpath+'/img/tajo.png" class="img-reponsive"/>';
				html=html+'</div> </div>';
				$(this).after(html);	  
		 }
		
      }); 
	}

/*try{
 var postack = $("#grillas").position().top;
  
   $(".chevron").on("click", function(e) {
	   	e.preventDefault();
        $("html, body").animate({ scrollTop: postack+80 }, 600);
        return false;
    });
}catch(error){
	console.log(error);
};*/

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    	$(this).ekkoLightbox({
		  showArrows:true,
		  alwaysShowClose: true,		
		   onShown: function() {
				$(".modal-footer").removeClass("hide").show();
				
			},
		}).promise().done(function(){
			$(".modal-dialog").css("max-width","auto");
			});
});
if(!md.mobile){
	$(".enlista").hover(
	  function(){
		$(this).children(".info").animate({"top":0},600,"swing");
	  },function(){
		$(this).children(".info").animate({"top":320},600,"swing");	
	  });		
	
}else{
	var events = false;
	$(".enlista").hover(
	  function(){
		 
		 // if(events==false){
		$(this).children(".info").stop(true, true).animate({"top":7},600,"swing").promise().done(function(){
			//	events=true;
			});
		//  }else{
			 // $(this).stop(false);
		//	  }
	  },function(){
		 //if(events==true){
		    $(this).children(".info").stop(true, true).animate({"top":320},600,"swing").promise().done(function(){
			//   events=false;
			});	
		// }else{
			 // $(this).stop(false);
		//	}
	  });		
	
}
});

$(window).load(function(){
	$(".icircle").each(function(index, element) {
    var ident = $(this).attr("id");
	var valore = $(this).data("size");
	var fontsizes = $(this).data("fontsize");
	circulosPorcentaje(valore,ident,fontsizes);
	});

	$(".ocircle").each(function(index, element) {
    var ident = $(this).attr("id");
	var valore = $(this).data("size");
	var fontsizes = $(this).data("fontsize");
	circulosPorcentaje(valore,ident,fontsizes);
	});
	
	$(".tcircle").each(function(index, element) {
    var ident = $(this).attr("id");
	var valore = $(this).data("size");
	var fontsizes = $(this).data("fontsize");
	//console.log("transport");
	circulosPorcentaje(valore,ident,fontsizes);
	});

try{

		$(".stack1").click(function(e){
			e.preventDefault();
			var stack1 = $("#istack1").position().top;
			//console.log("click stack");
			 $("html, body").animate({ scrollTop: stack1+20 }, 600,"swing");
		});
		
		$(".stack2").click(function(e){
			e.preventDefault();
			var stack2 = $("#istack2").position().top;
			 $("html, body").animate({ scrollTop: stack2+20 }, 600,"swing");
		});
		$(".stack3").click(function(e){
			e.preventDefault();
			var stack3 = $("#istack3").position().top;
			 $("html, body").animate({ scrollTop: stack3+20 }, 600,"swing");
		});
		$(".stack4").click(function(e){
			e.preventDefault();
			var stack4 = $("#istack4").position().top;
			 $("html, body").animate({ scrollTop: stack4+20 }, 600,"swing");
		});
	}catch(err){
		//console.log("no inicializado "+err);
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

function circulosPorcentaje(valor_radio,padre,fontsise){
	
	  var padre = "#"+padre; 
	  
	  $(padre).addClass("circlemaster");
	  var valor = parseInt(valor_radio);
	  if(valor<40){
		  valor = 30;
		  }
	   var total = valor * 4;
	   var porcent = (16 / 100) * valor;
	   var porcent2 = (65 / 100) * valor;
	   
	   
	  fontp = (valor*3)/10;
	  if(fontp<9){
		  fontp= 10;
		}
	  var fp = fontp+"px";
	  
	  if(total > 220){
		  total = 200;
		  }
	   if(valor_radio > 95){
		   total = 260;
		   }
	  //console.log(valor_radio+" "+total);
	  $(padre).css({"height":total+10,"width":total+10});
	  $(padre).children(".radio2").children(".creciente").css({"font-size":fontsise,"line-height":fp});
	  $(padre).children(".circulo").css({"height":total,"width":total});  
	  $(padre).children(".proimage").css({"height":total,"width":total});
	  $(padre).children(".radio1").css({"height":total-porcent,"width":total-porcent});  
	  $(padre).children(".radio2").css({"height":total-porcent2,"width":total-porcent2});  
	   
}


var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	  var player;
	  function onYouTubeIframeAPIReady() {

      player = new YT.Player('ctl-player', {
			  height: '360',
			  width: '640',
			  videoId: '9D_iHYAhGzQ',
			  playerVars: {  'controls': 1, 'modestbranding': 1, 'rel': 0 },
			  events:{
				  'onStateChange': onPlayerStateChange
				  }
 
	   });
 			$('#ctl-player').css({"width":"100%","height":"100%","top":"0","position":"absolute"});
	  		
	  };
	  function onPlayerReady(event) {
 
 		 event.target.playVideo();
		}
      function playerReady() {
        player.playVideo();
      }
	  function playVideo(){
		  player.playVideo();
		  }
	  function loadVideoMedia(myvideo){
		   player.loadVideoById(myvideo);
		  }
      var done = false;
      function onPlayerStateChange(event) { 
		
		if(player.getPlayerState() == 0){			
			  $(".ctl-wrapper-modal").fadeOut(359,"swing",function(){
				  	 var stacker = $("#desarrollo-sostenible").position().top;
  					 $("html, body").animate({ scrollTop: stacker+20 }, 600,"swing");
			  });		  
			}
      }
      function stopVideo() {
        player.stopVideo();
      } 
	
	
	

$(document).ready(function(e) {

	  
     $(".modal_slide").click(function(e){
	     e.preventDefault();
		 var video = $(this).data("video");
	     $(".ctl-wrapper-modal").fadeIn(350,"swing");			
		 
		 //playVideo();	 
		 loadVideoMedia(video);
	});

	 $(".ctl-closeBox").on("click",function(e){
		e.preventDefault();
		       $(".ctl-wrapper-modal").fadeOut(359,"swing");
			 stopVideo();
	}); 
});


///mightslider
try{
var $win = $(window),
            isTouch = !!('ontouchstart' in window),
            clickEvent = isTouch ? 'tap' : 'click';

        (function(){
            /**
             * Calculate the slides width in percent based on the parent's width.
             *
             * @return {String}
             */
            function calculator(width){
                var percent = '33.33%';

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

            // Global slider's DOM elements
            var $carousel = $('#simple'),
                $pagesbar = $('.mSPages', $carousel),
                $frame = $('.frame', $carousel);

            // Calling new mightySlider class
            var slider = new mightySlider($frame, {
                speed: 1000,
                easing: 'easeOutExpo',
                viewport: 'fill',

                // Navigation options
                navigation: {
                    navigationType: 'basic',
                    slideSize: calculator($win.width())
                },

                // Commands options
                commands: {
                    buttons: 1
                },

                // Pages options
                pages: {
                    pagesBar:       $pagesbar[0],
                    activateOn:     clickEvent
                },

                // Dragging options
                dragging: {
                    mouseDragging: 0,
                    touchDragging: 0
                }
            }).init();

            // Register window :resize event callback
            $win.resize(function(){
                // Update slider options using 'set' method
                slider.set({
                    navigation: {
                        slideSize: calculator($win.width())
                    }
                });
            });
        })();
}catch(err){
	//console.log("no inicializado "+err);
	}