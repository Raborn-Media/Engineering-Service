// Import everything from autoload folder
import './autoload/**/*'; // eslint-disable-line

// Import local dependencies
import './plugins/lazyload';
import './plugins/modernizr.min';
import 'slick-carousel';
import 'jquery-match-height';
import objectFitImages from 'object-fit-images';
import '@fancyapps/fancybox/dist/jquery.fancybox.min';
// import { jarallax, jarallaxElement } from 'jarallax';
import ScrollOut from 'scroll-out';

/**
 * Import scripts from Custom Divi blocks
 */
// eslint-disable-next-line import/no-unresolved
// import '../blocks/divi/**/index.js';

/**
 * Import scripts from Custom Elementor widgets
 */
// eslint-disable-next-line import/no-unresolved
// import '../blocks/elementor/**/index.js';

/**
 * Import scripts from Custom ACF Gutenberg blocks
 */
// eslint-disable-next-line import/no-unresolved
// import '../blocks/gutenberg/**/index.js';

/**
 * Init foundation
 */
$(document).foundation();

/**
 * Fit slide video background to video holder
 */
function resizeVideo() {
  let $holder = $('.videoHolder');
  $holder.each(function () {
    let $that = $(this);
    let ratio = $that.data('ratio') ? $that.data('ratio') : '16:9';
    let width = parseFloat(ratio.split(':')[0]);
    let height = parseFloat(ratio.split(':')[1]);
    $that.find('.video').each(function () {
      if ($that.width() / width > $that.height() / height) {
        $(this).css({
          width: '100%',
          height: 'auto',
        });
      } else {
        $(this).css({
          width: ($that.height() * width) / height,
          height: '100%',
        });
      }
    });
  });
}

/**
 * Scripts which runs after DOM load
 */
$(document).on('ready', function () {
  $(document).on('gform_post_render', function () {
    $('.gform_wrapper input[type=file]').on('change', function () {
      const fileName = $(this).val().split('\\').pop();
      $('label', $(this).parent().parent()).html(fileName);
    });
  });

  $('.menu-icon').on('click', function () {
    var headerHeight = $('.header').outerHeight();
    $('.top-bar').css('top', headerHeight);
    if ($('body').hasClass('admin-bar')) {
      $('.top-bar').css('top', headerHeight + 46);
    }
  });

  /**
   * Search
   */
  $('.search-button-show').on('click', function () {
    $('.search-form').toggleClass('show');
  });

  // Smooth scroll function
  $('.scroll-btn').on('click', function (event) {
    if (this.hash !== '') {
      event.preventDefault();
      let target = this.hash;
      let topOffset = 80; // Adjust this value according to your layout if you have a fixed header
      $('html, body').animate(
        {
          scrollTop: $(target).offset().top - topOffset,
        },
        800,
        function () {
          window.location.hash = target;
        }
      );
    }
  });

  /**
   * Make elements equal height
   */
  $('.matchHeight').matchHeight();

  /**
   * IE Object-fit cover polyfill
   */
  if ($('.of-cover').length) {
    objectFitImages('.of-cover');
  }

  /**
   * Add fancybox to images
   */
  $('.gallery-item')
    .find('a[href$="jpg"], a[href$="png"], a[href$="gif"]')
    .attr('rel', 'gallery')
    .attr('data-fancybox', 'gallery');
  $(
    '.fancybox, a[rel*="album"], a[href$="jpg"], a[href$="png"], a[href$="gif"]'
  ).fancybox({
    minHeight: 0,
    helpers: {
      overlay: {
        locked: false,
      },
    },
  });

  /**
   * Init parallax
   */
  // jarallaxElement();
  // jarallax(document.querySelectorAll('.jarallax'), {
  //   speed: 0.5,
  // });

  /**
   * Detect element appearance in viewport
   */
  ScrollOut({
    // offset: function() {
    //   return window.innerHeight - 200;
    // },
    once: false,
    // onShown: function(element) {
    //   if ($(element).is('.ease-order')) {
    //     $(element)
    //       .find('.ease-order__item')
    //       .each(function(i) {
    //         let $this = $(this);
    //         $(this).attr('data-scroll', '');
    //         window.setTimeout(function() {
    //           $this.attr('data-scroll', 'in');
    //         }, 300 * i);
    //       });
    //   }
    // },
  });

  /**
   * Remove placeholder on click
   */
  const removeFieldPlaceholder = () => {
    $('input, textarea').each((i, el) => {
      $(el)
        .data('holder', $(el).attr('placeholder'))
        .on('focusin', () => {
          $(el).attr('placeholder', '');
        })
        .on('focusout', () => {
          $(el).attr('placeholder', $(el).data('holder'));
        });
    });
  };

  removeFieldPlaceholder();

  $(document).on('gform_post_render', () => {
    removeFieldPlaceholder();
  });

  /**
   * Scroll to Gravity Form confirmation message after form submit
   */
  $(document).on('gform_confirmation_loaded', function (event, formId) {
    let $target = $('#gform_confirmation_wrapper_' + formId);
    if ($target.length) {
      $('html, body').animate({ scrollTop: $target.offset().top - 50 }, 500);
      return false;
    }
  });

  /**
   * Hide gravity forms required field message on data input
   */
  $('body').on(
    'change keyup',
    '.gfield input, .gfield textarea, .gfield select',
    function () {
      let $field = $(this).closest('.gfield');
      if ($field.hasClass('gfield_error') && $(this).val().length) {
        $field.find('.validation_message').hide();
      } else if ($field.hasClass('gfield_error') && !$(this).val().length) {
        $field.find('.validation_message').show();
      }
    }
  );

  /**
   * Add `is-active` class to menu-icon button on Responsive menu toggle
   * And remove it on breakpoint change
   */
  $(window)
    .on('toggled.zf.responsiveToggle', function () {
      $('.menu-icon').toggleClass('is-active');
    })
    .on('changed.zf.mediaquery', function () {
      $('.menu-icon').removeClass('is-active');
    });

  /**
   * Close responsive menu on orientation change
   */
  $(window).on('orientationchange', function () {
    setTimeout(function () {
      if ($('.menu-icon').hasClass('is-active') && window.innerWidth < 641) {
        $('[data-responsive-toggle="main-menu"]').foundation('toggleMenu');
      }
    }, 200);
  });

  resizeVideo();
});

/**
 * Scripts which runs after all elements load
 */
$(window).on('load', function () {
  // jQuery code goes here

  let $preloader = $('.preloader');
  if ($preloader.length) {
    $preloader.addClass('preloader--hidden');
  }
});

/**
 * Scripts which runs at window resize
 */
$(window).on('resize', function () {
  // jQuery code goes here

  resizeVideo();
});
const header = $('.header');

/**
 * Scripts which runs on scrolling
 */
$(window).on('scroll', function () {
  // jQuery code goes here

  const scrollPosition = $(window).scrollTop();
  const headerHeight = header.outerHeight();

  if (scrollPosition >= headerHeight) {
    header.addClass('active');
  } else {
    header.removeClass('active');
  }
});
