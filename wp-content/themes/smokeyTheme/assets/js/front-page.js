jQuery(document).ready(function($) {


/*
 * Parallax stuff
 */

$(window).scroll(function() {
  parallax();
});

function parallax() {

  var wScroll = $(window).scrollTop();
  var wWidth = $(window).width();
  var speed = 0.75;
  var heightShift = (wWidth * -0.3125) + 400;

  $('.parallax').each(function() {
    var parallaxTop = $(this).offset().top;
    var newHeight = (wScroll - parallaxTop)*speed + heightShift
    if (wWidth > 1280) {
      $(this).css('background-position', 'center ' + newHeight + 'px')
    }
  })

}

/* complicated version
  (function($){
  $.fn.parallax = function(options){
    var $$ = $(this);
    offset = $$.offset();
    var defaults = {
      'start': 0,
      'stop': offset.top + $$.height(),
      'coeff': 0.95
    };
    var opts = $.extend(defaults, options);
    return this.each(function(){

      $(window).bind('scroll', function() {
        var mobileLogo = $('#logo--static').css('display');
        windowTop = $(window).scrollTop();
        if((windowTop >= opts.start) && (windowTop <= opts.stop) && (mobileLogo == 'none')) {
          let mq = window.matchMedia( '(min-width: 1440px)' );
          let heightShift = mq.matches ? -350 : -150;
          let leftShift = mq.matches ? -300 : -200;
          newCoord = windowTop * opts.coeff + heightShift;
          $$.css({
              'background-position': leftShift + 'px '+ newCoord  + 'px'
            });
          } else {
            $$.css({
                'background-position': 'center'
              });
          }
        });
      });
    };
  })(jQuery);

// call the plugin
var i = -0.075;
$('#parallax-1').parallax({ 'coeff':i });
*/

/*
 * Sticky navbar
*/

 var jumbotronTop = $('.jumbotron').offset().top;
 var jumbotronHeight = $('.jumbotron').height();
 var navbarHeight = $('#navbar').height();
 var stickyNavTop = $('#navbar').offset().top;

 function stickyNav() {
   var scrollTop = $(window).scrollTop();
   var mobileLogo = $('#logo--static').css('display');
   if (scrollTop >= stickyNavTop /*|| mobileLogo == 'block'*/) {
     $('#navbar').addClass('stickyNavbar');
     $('#general-info').css('margin-top', '80px');
     $('#logo').hide();
     $('#logo--static').show();
   } else {
     $('#navbar').removeClass('stickyNavbar');
     $('#general-info').css('margin-top', '0');
     $('#logo').show();
     $('#logo--static').hide();
   }
 };



/*
 * Sticky logo + resize
 */
var logoTop = $('#logo').offset().top;
var jumbotronTop = $('.jumbotron').offset().top;
var jumbotronHeight = $('.jumbotron').height();
let initalHeight = 350;
let endHeight = 60;
let heightChange = initalHeight - endHeight;
var constant = (jumbotronTop + jumbotronHeight - logoTop)/heightChange;

function stickyLogo() {
  var scrollTop = $(window).scrollTop();
  var newHeight = initalHeight-((scrollTop - logoTop)/constant);
  if (scrollTop > logoTop) {
    $('#logo').addClass('stickyLogo');
  } else {
    $('#logo').removeClass('stickyLogo');
  }
};

function resizeLogo() {
  var scrollTop = $(window).scrollTop();
  var newHeight = initalHeight-((scrollTop - logoTop)/constant);
  if (scrollTop > logoTop && scrollTop < jumbotronTop + jumbotronHeight) {
    $('#logo').css({
      'height': newHeight + 'px'
    });
  } else if (scrollTop >= jumbotronTop + jumbotronHeight) {
    $('#logo').css({
      'height': initalHeight - heightChange + 'px'
    });
  } else if (scrollTop < logoTop) {
    $('#logo').css({
      'height': initalHeight + 'px'
    });
  }
};



// Call sticky functions
stickyNav();
stickyLogo();
resizeLogo();
$(window).scroll(function() {
   stickyNav();
   stickyLogo();
   resizeLogo();
 });

/*
 * Link on logo
 */

$('#logo').click(function() {
  var scrollTop = $(window).scrollTop();
  var jumbotronBottom = jumbotronTop + jumbotronHeight;
  if (scrollTop < 600 || scrollTop > jumbotronBottom) {

    $("html, body").animate({
          scrollTop: jumbotronBottom
        },
  			100,);
  } else if (scrollTop > 1){
    $("html, body").animate(
  			{scrollTop: 0},
  			100,);
  }
});
$('#logo--static').click(function() {
  $("html, body").animate(
      {scrollTop: 0},
      100,);
});


/*
 * Fade sections into view
 */

$('.fade-in').each(function(){
  $(this).css({
    opacity: 0
  });
})

function sectionFadeIn() {
  let scrollBottom = $(window).scrollTop() + $(window).height();
  let viewportHeight = document.documentElement.clientHeight || window.innerHeight;
  let heightModifier = 0.2;
  let animationLength = 950;

  $('.fade-early').each(function(){
    var fadeInTop = $(this).offset().top;
    if (scrollBottom > fadeInTop + viewportHeight*heightModifier) {
      $(this).animate({
        opacity: 1
        },
        animationLength,);
    }
  });

  $('.fade-late').each(function(){
    var fadeInTop = $(this).offset().top;
    if (scrollBottom > fadeInTop + viewportHeight*heightModifier) {
      $(this).delay(400).animate({
        opacity: 1
        },
        animationLength,);
    }
  });

};

sectionFadeIn();

$(window).scroll(function() {
  sectionFadeIn();
 });

 /*
  * Loop through testimonials
  */

  function slideTestimonials() {
    var testimonials = document.getElementsByClassName("testimonial");
    $(testimonials[0]).animate({
        left: '-200%',
        opacity: '0'
      }, 1500, function() {
        $(testimonials[0]).css('left', '150%');
        $(testimonials[0]).appendTo('#testimonials .testimonialSlides');
      });

    $(testimonials[0]).next().animate({
        left: '0',
        opacity: '1'
    }, 1500, function() {
      setTimeout(slideTestimonials, 5000);
    });
  }

  slideTestimonials();

});
