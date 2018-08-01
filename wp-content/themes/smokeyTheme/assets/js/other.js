jQuery(document).ready(function($) {

  /* FAQ answer open */
  /*$('.faq-toggle').click(function() {
    $(this).siblings('.answer').toggleClass('answer--open', 400);
    $(this).toggleClass('plus-sign--open');
    $(this).parent().siblings().children().removeClass('plus-sign--open');
    $(this).parent().siblings().children().removeClass('answer--open', 400);
  });*/

  $('.faq--single').click(function() {
    $(this).children('.plus-sign').toggleClass('plus-sign--open');
    $(this).children('.answer').toggleClass('answer--open', 400);
    $(this).siblings().children('.plus-sign').removeClass('plus-sign--open');
    $(this).siblings().children('.answer').removeClass('answer--open', 400);
  });


});
