(function ($) {
  $(document).ready(function () {
    if (typeof $.fn.lightGallery === 'function' && $('body').hasClass('woocommerce') && $('.images').length > 0) {
      $('.images').on('onAfterAppendSubHtml.lg', function (event, index) {
        $('.lg-sub-html').append('<span>Bild zeigt evtl. Zubehör. Lieferumfang beachten!</span>');
      });
    }
  });
})(jQuery);
