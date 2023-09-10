
$(document).ready(function(){

  const swiperSlides = document.getElementsByClassName("swiper-slide");
  const breakPoint = 767; // ブレークポイントを設定
  let swiper;
  let swiperBool;

  window.addEventListener(
    "load",
    () => {
      if (breakPoint > window.innerWidth) {
        swiperBool = false;
      } else {
        createSwiper();
        swiperBool = true;
      }
    },
    false
  );

  window.addEventListener(
    "resize",
    () => {
      if (breakPoint > window.innerWidth && swiperBool) {
        swiper.destroy(false, true);
        swiperBool = false;
      } else if (breakPoint <= window.innerWidth && !swiperBool) {
        createSwiper();
        swiperBool = true;
      }
    },
    false
  );

  // Swiper
  const createSwiper = () => {
    swiper = new Swiper('.swiper', {
      effect: "cards",
      grabCursor: true,
      width: 500,

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      breakpoints: {
        1000: {
          width: 450,
          perSlideRotate: 10,
        },

        1200: {
          width: 600,
        },
      }
    });
  }

  // お問い合わせ
  let $form = $('#js-form');
  $form.submit(function(e) { 
    $.ajax({ 
     url: $form.attr('action'), 
     data: $form.serialize(), 
     type: "POST", 
     dataType: "xml", 
     statusCode: { 
        0: function() { 
          $form.slideUp();
          $('.end-message').slideDown();
          
        }, 
        200: function() { 
          $form.slideUp();
          $('.false-message').slideDown();
        }
      } 
    });
    return false;
  });

  let $submit = $('#js-submit')
  $('#js-form input, #js-form textarea').on('change', function() {
    if (
      $('#js-form input[type="text"]').val() !== "" &&
      $('#js-form input[type="email"]').val() !== "" &&
      $('#js-form textarea').val() !== ""
    ) {
      $submit.prop('disabled', false);
      $submit.addClass('active');
    } else {
      $submit.prop('disabled', true);
      $submit.removeClass('active');
    }
  });

  // page topボタンの表示の切り替え
  jQuery(window).on('scroll', function($) {
    if (jQuery(this).scrollTop() > 200) {
      jQuery('.page-top').toggleClass('.is-scroll').fadeIn(500);
    } else {
      jQuery('.page-top').toggleClass('.is-scroll').fadeOut(500);
    }

    return false;
  });

  // page topボタンをclickされた時の挙動
  jQuery('.page-top').click(function () {
    jQuery('body,html').animate({
      scrollTop: 0
    }, 500);
    return false;
  });
});
