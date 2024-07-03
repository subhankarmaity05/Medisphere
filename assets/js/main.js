
(function ($) {
  'use strict';


jQuery(document).ready(function($) {

	//menu active
	var stellarnav =  $('.stellarnav');
	stellarnav.stellarNav({
		theme: 'light',
		breakpoint: 960,
		position: 'right',
		phoneBtn: '18009997788',
		locationBtn: 'https://www.google.com/maps'
	});

  var welcome__carousel = $('.welcome__carousel');
  welcome__carousel.owlCarousel({
  	loop:true,
  	nav:false,
    animateIn:'fadeIn',
    animateOut:'fadeOut',
    items:1,
    dots:true,
  	autoplay:true,
  })

  //==welcome_area animation==\\
  welcome__carousel.on('translate.owl.carousel', function() {
      $('.welcome__carousel .welcome__line').removeClass('fadeInDown animated').hide();
      $('.welcome__carousel .welcome__title h1').removeClass('fadeInDown animated').hide();
      $('.welcome__carousel .welcome__title h6').removeClass('fadeInDown animated').hide();
      $('.welcome__carousel a.cbtn1').removeClass('fadeInDown animated').hide();
  });
  welcome__carousel.on('translated.owl.carousel', function() {
      $('.owl-item.active .welcome__title h1').addClass('fadeInDown animated').show();
      $('.owl-item.active .welcome__title h6').addClass('fadeInDown animated').show();
      $('.owl-item.active a.cbtn1').addClass('fadeInDown animated').show();
      $('.owl-item.active .welcome__line').addClass('fadeInDown animated').show();
  });

  var welcome__carousel2 = $('.welcome__carousel2');
  welcome__carousel2.owlCarousel({
    loop:true,
    nav:true,
    navText : ["<span><</span>","<span>></span>"],
    navClass:['owl-prev','owl-next'],
    items:1,
    dots:false,
    animateIn:'fadeIn',
    animateOut:'fadeOut',
    // autoplay:true,
  })

  //==welcome_area animation==\\
  welcome__carousel2.on('translate.owl.carousel', function() {
    $('.welcome__carousel2 .welcome__title2 h1').removeClass('fadeInDown animated').hide();
    $('.welcome__carousel2 .welcome__title2 h6').removeClass('fadeInDown animated').hide();
    $('.welcome__carousel2 a.cbtn2').removeClass('fadeInDown animated').hide();
  });
  welcome__carousel2.on('translated.owl.carousel', function() {
    $('.owl-item.active .welcome__title2 h1').addClass('fadeInDown animated').show();
    $('.owl-item.active .welcome__title2 h6').addClass('fadeInDown animated').show();
    $('.owl-item.active a.cbtn2').addClass('fadeInDown animated').show();
  });

  var testimonial__carousel = $('.testimonial__carousel');
  testimonial__carousel.owlCarousel({
    loop:true,
    nav:true,
    margin:30,
    autoplay:false,
    responsive:{
      0:{
        items:1
      },
      800:{
        items:2
      }
    }

  })
      
  var logo_carousel = $('.logo_carousel');
  logo_carousel.owlCarousel({
  	loop:true,
  	nav:false,
  	margin:30,
  	autoplay:false,
  	responsive:{
  		0:{
  			items:1
  		},
  		600:{
  			items:2
  		},
  		1000:{
  			items:5
  		}
  	}
  })

  var testimonials__2__carousel = $('.testimonials__2__carousel');
  testimonials__2__carousel.owlCarousel({
  	loop:true,
  	nav:false,
  	margin:30,
  	items:1,
  	autoplay:false,
  })

  var project__carousel = $('.project__carousel');
  project__carousel.owlCarousel({
  	loop:true,
  	nav:false,
  	margin:30,
  	autoplay:false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      }, 
      1000:{
        items:3
      }
    }
  })

  var team__3__carousel = $('.team__3__carousel');
  team__3__carousel.owlCarousel({
  	loop:true,
  	nav:false,
  	center:true,
  	autoplay:false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      },
      1000:{
        items:5,
      }
    }
  })


  var team__6__carousel = $('.team__6__carousel');
  team__6__carousel.owlCarousel({
    loop:true,
    nav:false,
    margin:5,
    center:true,
    autoplay:false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      },
      1000:{
        items:4,
      }
    }
  })


  var my_testmonial_slide = $('.teestimonial__3');
  if ( my_testmonial_slide.length > 0 ) {
    var my_testmonial_slide = tns({
      container: '.teestimonial__3',
      axis:'vertical',
      slideBy: 'page',
      autoplay: false, 
      swipeAngle: false,
      speed: 400, 
      controls:false, 
      nav:false,

      autoplayButtonOutput:false,
      responsive:{
        0:{
          items: 1
        },
        768:{
          items:2
        }
      }
    });
  }

    
  function stickyNav() {
    //fixed nav bar active
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("header");
    var sticky = header.offsetTop;
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
  }
  stickyNav();

  var play__btn = $('.play__btn, .about__play__btn, .play_btn');
  play__btn.modalVideo();

   $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

  //wow animations active here
  new WOW().init();

  var preloader = $('.loadingio');
  function preloader_func(){
      preloader.delay(200).fadeOut(500);
  }
  preloader_func();
      //current class adding 
  var navbarmneuclass = $('.navbarmneuclass');
  navbarmneuclass.onePageNav();

 });

   //jquery load function start
  jQuery(window).on("load", function() {
      
  });


}(jQuery));



// Typing effect about section--------------------------

var TxtType = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
  this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
  this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
  delta = this.period;
  this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
  this.isDeleting = false;
  this.loopNum++;
  delta = 500;
  }

  setTimeout(function() {
  that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('typewrite');
  for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-type');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtType(elements[i], JSON.parse(toRotate), period);
      }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
  document.body.appendChild(css);
};