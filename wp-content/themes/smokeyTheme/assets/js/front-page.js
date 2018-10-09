jQuery(document).ready(function($) {


/*
 * Parallax
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


/*
 * Sticky navbar + anchor fade in
*/

 var jumbotronTop = $('.jumbotron').offset().top;
 var jumbotronHeight = $('.jumbotron').height();
 var navbarHeight = $('#navbar').height();
 var stickyNavTop = $('#navbar').offset().top;
 var $navElements = $('.menu-left-of-logo-container a, .menu-right-of-logo-container a');

 function stickyNav() {
   var scrollTop = $(window).scrollTop();
   let navbarHeight = $('#navbar').height();
   if (scrollTop >= stickyNavTop) {
     $('#navbar').addClass('stickyNavbar');
     $('#general-info').css('margin-top', navbarHeight + 'px');
     $('#logo').hide();
     $('#logo--static').css('visibility', 'visible');
     $navElements.css('opacity', 1);
   } else {
     $('#navbar').removeClass('stickyNavbar');
     $('#general-info').css('margin-top', '0');
     $('#logo').show();
     $('#logo--static').css('visibility', 'hidden');
   }
 };

 function anchorsHideOnStart() {
   $navElements.css('opacity', 0);
 }



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
    $('#jt-date').hide();
  } else {
    $('#logo').removeClass('stickyLogo');
    $('#jt-date').show();
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
anchorsHideOnStart();
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

$('#logo, #jt-date').click(function() {
  var scrollTop = $(window).scrollTop();
  var jumbotronBottom = jumbotronTop + jumbotronHeight;
  if (scrollTop < 600) {
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
  var scrollTop = $(window).scrollTop();
  var jumbotronBottom = jumbotronTop + jumbotronHeight;
  let jumbotronDisplay = $('.jumbotron').css('display');
  if (scrollTop > jumbotronBottom && jumbotronDisplay == 'flex') {
    $("html, body").animate(
        {scrollTop: jumbotronBottom},
        100,);
  } else {
    $("html, body").animate(
        {scrollTop: 0},
        100,);
  }
});

/*
 * Hamburger menu functions
 */

 $('#hamburger').click(function() {
   $('#hamburger span').toggleClass('open');
   $('#mobile-ul').toggleClass('open');
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
  let animationLength = 1450;

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
      $(this).delay(700).animate({
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


  function regDiagonal() {
    console.log("regDiagonal fired");
    let height = window.innerHeight;
    let width = window.innerWidth;
    console.log(width);
    if (height * 1.5 > width) {

      $('#registration').addClass('reg-narrow');
      $('.bg-left img').addClass('polygon-narrow');
    } else {
      $('#registration').removeClass('reg-narrow');
      $('.bg-left img').removeClass('polygon-narrow');
    }
  }

  // $(window).resize(function() {
  //   regDiagonal();
  // });



});
