// Doryo Theme Main JavaScript File
(function () {
  "use strict";
  /**
   * Initializes all theme-related JavaScript functionality.
   * Calls header and Elementor widget initializers.
   */
  function initializeTheme() {
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initializeTheme);
  } else {
    initializeTheme();
  }
})();
