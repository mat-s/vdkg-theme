(function ($) {
  $(function () {
    // Scroll-Funktion auslagern
    const handleScroll = function () {
      if ($(window).scrollTop() > 0) {
        $("body").addClass("scrolled");
      } else {
        $("body").removeClass("scrolled");
      }
    };

    // Scroll-Event binden
    $(window).on("scroll", handleScroll);

    // Scroll-Zustand beim Laden der Seite prüfen
    handleScroll();

    // Elementor-Frontend-Initialisierung
    $(window).on("elementor/frontend/init", function () {
      // Widgets
      elementorFrontend.hooks.addAction("frontend/element_ready/rvnsbrck_image.default", WidgetRvnsbrckImageHandler);
    });
  });
})(jQuery);

/**
 * Ravensbrück Image Widget Handler
 *
 * @param $scope The Widget wrapper element as a jQuery element
 * @param $ The jQuery alias
 */
var WidgetRvnsbrckImageHandler = function ($scope, $) {
  const $wrapper = $scope.find(".rvnsbrck-image");
  const $infoBtn = $scope.find(".rvnsbrck-image__info");
  const $caption = $scope.find(".rvnsbrck-image__caption");

  $infoBtn.on("click", function (e) {
    e.preventDefault();
    $wrapper.toggleClass("rvnsbrck-image__caption--visible");
  });
};