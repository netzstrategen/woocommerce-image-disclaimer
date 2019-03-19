(function ($) {
  $(document).ready(function () {

    $('.disclaimer-overlay').on('click', function () {
      $tab = $('.woocommerce-tabs ul.tabs li.common_tab_tab a');
      $tab.trigger('click');
      $('html, body').animate({
        scrollTop: $tab.offset().top - 230
      }, 600);
    });

    if (typeof $.fn.lightGallery === 'function' && $('body').hasClass('woocommerce') && $('.images').length > 0) {
      $('.images').on('onAfterAppendSubHtml.lg', function (event, index) {
        $('.lg-sub-html').append('<span>Bild zeigt evtl. Zubehör. Lieferumfang beachten!</span>');
      });
    }
  });
})(jQuery);
