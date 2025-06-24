$(function () {
  $('.hero-slider').slick({
    autoplay: true,
    dots: true,
    infinite: true,
    speed: 800,
    fade: true,
    cssEase: 'linear',
    autoplaySpeed: 3000,
    rtl: $('html').attr('lang') === 'ar',
    prevArrow: $('.custom-prev'),
    nextArrow: $('.custom-next'),
  });
  // mixitup
  if ($('#projects').length) {
    mixitup($('#projects'), {
      load: {
        filter: '*',
      },
    });
  }

  // image zoom
  Fancybox.bind('[data-fancybox]', {
    autoplay: true,
  });
  // clients slider
  $('#clients-slider').slick({
    autoplay: true,
    dots: false,
    autoplaySpeed: 0,
    speed: 5000,
    arrows: false,
    swipe: false,
    slidesToShow: 6,
    cssEase: 'linear',
    pauseOnFocus: false,
    pauseOnHover: false,
    rtl: $('html').attr('lang') === 'ar',
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        },
      },

      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
  // testimonials slider
  $('#testimonials-slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,

    infinite: true,
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    rtl: $('html').attr('lang') === 'ar',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $('#services-slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: $('.custom-prev'),
    nextArrow: $('.custom-next'),
    infinite: true,
    dots: true,

    slidesToShow: 3,
    slidesToScroll: 3,
    rtl: $('html').attr('lang') === 'ar',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $('#navbar-toggler').on('click', function () {
    $('#overlay').fadeIn();
    $('#sidebar').addClass('active');
  });

  $('#sidebar a').on('click', function () {
    $('#overlay').fadeOut();
    $('#sidebar').removeClass('active');
  });
  // Optional: Close menu when clicking on overlay
  $('#overlay').on('click', function () {
    $('#overlay').fadeOut();
    $('#sidebar').removeClass('active');
  });

  // handle scroll
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 50) {
      $('#navbar').addClass('scrolled');
    } else {
      $('#navbar').removeClass('scrolled');
    }
  });
  AOS.init({
    once: true,
  });
});
