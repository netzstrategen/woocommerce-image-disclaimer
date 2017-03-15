(function ($) {
  $(document).ready(function () {

    $('.disclaimer-overlay').on('click', function () {
      $tab = $('.woocommerce-tabs ul.tabs li.common_tab_tab a');
      $tab.trigger('click');
      $('html, body').animate({
        scrollTop: $tab.offset().top - 230
      }, 600);
    });

  });
})(jQuery);
