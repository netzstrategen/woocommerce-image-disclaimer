(function ($) {
  $(document).ready(function () {
    if ($('body').hasClass('woocommerce') && $('.images').length > 0) {
      var disclaimer = 'Bild zeigt evtl. Zubehör. Lieferumfang beachten!';

      // Support for lightgallery.
      if (typeof $.fn.lightGallery === 'function') {
        $('.images').on('onAfterAppendSubHtml.lg', function (event, index) {
          $('.lg-sub-html').append('<span>' + disclaimer + '</span>');
        });
      }

      // Support for fancybox.
      if (typeof $.fn.fancybox === 'function') {
        $(document).on('beforeShow.fb', function(e, instance, slide) {
          if (!$('.fancybox-caption__image-disclaimer').length) {
            $('.fancybox-caption').append('<div class="fancybox-caption__image-disclaimer">' + disclaimer + '</div>');
          }
        });
      }
    }
  });
})(jQuery);
