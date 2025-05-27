<?php
/**
 * Enqueue theme assets compiled by Gulp.
 * 
 * @return void
 */
function theme_enqueue_assets() {
  $theme_uri = get_stylesheet_directory_uri();
  $theme_dir = get_stylesheet_directory();
  
  // Enqueue parent theme style (Hello Elementor)
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  
  // Enqueue compiled CSS
  $css_file = '/style.css';
  if (file_exists($theme_dir . $css_file)) {
    wp_enqueue_style(
      'theme-styles',
      $theme_uri . $css_file,
      array(),
      filemtime($theme_dir . $css_file)
    );
  }
  
  // Enqueue compiled JS
  $js_file = '/app.js';
  if (file_exists($theme_dir . $js_file)) {
    wp_enqueue_script(
      'theme-scripts',
      $theme_uri . $js_file,
      array(),
      filemtime($theme_dir . $js_file),
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

/**
 * Allow additional file types in media uploads.
 *
 * @param array $mime_types Current list of allowed mime types.
 * @return array Updated list with additional mime types.
 */
function theme_add_mime_types($mime_types) {
  $mime_types['svg']  = 'image/svg+xml';
  $mime_types['webp'] = 'image/webp';
  return $mime_types;
}
add_filter('upload_mimes', 'theme_add_mime_types');

/**
 * Adds a custom widget category for Elementor.
 *
 * Registers the "Dart Center" category for use with custom widgets.
 *
 * @param \Elementor\Elements_Manager $elements_manager Elementor's manager instance.
 * @return void
 */
function add_elementor_widget_categories($elements_manager) {
  $categories = [];
  $categories['vdkg'] =
      [
          'title' => __('VDKG', 'vdkg-theme'),
          'icon' => 'far fa-building',
      ];

  $old_categories = $elements_manager->get_categories();
  $categories = array_merge($categories, $old_categories);

  $set_categories = function ($categories) {
      $this->categories = $categories;
  };

  $set_categories->call($elements_manager, $categories);
}

/**
 * Disable the big image size threshold.
 *
 * This filter disables the WordPress feature that automatically resizes large images
 * to a smaller size when uploaded.
 *
 * @return bool Always returns false.
 */
add_filter( 'big_image_size_threshold', '__return_false' );

/**
 * Registers custom Elementor widgets and categories.
 *
 * Loads the Dart Resources widget and registers it with Elementor.
 * Also includes custom category registration logic.
 *
 * @return void
 */
function register_custom_elementor_widgets() {
  add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');

}
add_action('elementor/widgets/register', 'register_custom_elementor_widgets');


/**
 * Includes additional scripts
 *
 * @since 1.0.0
 */
include 'inc/remove-comments.php';