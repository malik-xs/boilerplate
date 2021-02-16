(function($, elementor) {
  "use strict";

  var Boilerplate = {
    init: function() {
      var widgets = {
        "boilerplate-back-to-top.default": Boilerplate.BackToTop,
      };
      $.each(widgets, function(widget, callback) {
        elementor.hooks.addAction("frontend/element_ready/" + widget, callback);
      });
    },
    BackToTop: function($scope) {
      var $el = $scope.find(".spaker_masonry_grid");
      if ($el.length > 0) {
        
        // $(window).on("scroll", function() {
        //     var scrolltop = $(window).scrollTop(),
        //         docHeight = $(document).height() / 2;
      
        //     if (scrolltop > docHeight) {
        //         $(".back_to_top").fadeIn("slow");
        //     } else {
        //         $(".back_to_top").fadeOut("slow");
        //     }
      
        //     if ($(document).width() < 992) {
        //         return;
        //     }
        //     if (scrolltop > 300) {
        //         $(".navbar-sticky").addClass("fixed-top");
        //     } else {
        //         $(".navbar-sticky").removeClass("fixed-top");
        //     }
        // });
        
      }
    },
  };
  $(window).on("elementor/frontend/init", Boilerplate.init);
})(jQuery, window.elementorFrontend);
