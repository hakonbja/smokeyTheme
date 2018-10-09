jQuery(document).ready(function($) {

  /* FAQ answer open */

  $('.faq--single').click(function() {
    $(this).children('.plus-sign').toggleClass('plus-sign--open');
    $(this).children('.answer').toggleClass('answer--open', 400);
    $(this).siblings().children('.plus-sign').removeClass('plus-sign--open');
    $(this).siblings().children('.answer').removeClass('answer--open', 400);
  });

  /* All artists filter */

  $('.btn').click(function() {
    let role = $(this).attr('class').split(' ')[0];
    $('.' + role).toggleClass('active inactive');
  });

/*
  let filterButtons = document.querySelectorAll('.filter .btn');
  Array.from(filterButtons).forEach((button) => {
    button.addEventListener('click', (e) => {
      console.log(e.path[1].classList[0]);
      let className = e.path[1].classList[0];
      let targets = document.getElementsByClassName(className);
      console.log(targets);
    });
  });
  */



});
