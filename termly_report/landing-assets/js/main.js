(function ($) {
  'use strict';

  $(document).on('ready', function () {
    $('.cs-smoth_scroll').on('click', function () {
      var thisAttr = $(this).attr('href');
      if ($(thisAttr).length) {
        var scrollPoint = $(thisAttr).offset().top;
        $('body,html').animate(
          {
            scrollTop: scrollPoint,
          },
          600
        );
      }
      return false;
    });
  });
})(jQuery); // End of use strict
