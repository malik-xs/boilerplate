jQuery(document).ready(function($) {
  "use strict";
  /* ----------------------------------------------------------- */
  /*  Mobile Menu
  /* ----------------------------------------------------------- */
  $(".dropdown > a").on("click", function(e) {
      if ($(window).width() > 991) {
          location.href = this.href;
      }
      var dropdown = $(this).parent(".dropdown");
      dropdown.find(">.dropdown-menu").slideToggle("show");
      $(this).toggleClass("opened");
      return false;
  });
    
});