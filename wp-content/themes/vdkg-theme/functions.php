<?php

/**
 * Theme Name: VDKG Theme
 * Description: Starter-Theme auf Basis von Hello Elementor, mit SCSS und Gulp Build-Prozess
 * Template: hello-elementor
 * Version: 1.0.0
 * Author: Matthias Seidel
 * Author URI: https://doryo.de
 * Text Domain: vdkg-theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
  exit;
}

class VdkgTheme
{
  private static $instance = null;

  public static function get_instance()
  {
    if (null === self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  private function __construct()
  {
    add_action('wp_enqueue_scripts', [$this, 'enqueue_assets'], 999);
    add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    add_action('after_setup_theme', [$this, 'theme_setup']);

    // Initialize Elementor Widgets
    $this->init_elementor_widgets();
    // Enable SVG upload support
    $this->enable_svg_upload();
  }

  private function init_elementor_widgets()
  {
    // Check if Elementor is installed and activated
    if (did_action('elementor/loaded')) {
      require_once get_stylesheet_directory() . '/widgets/WidgetManager.php';
      new \VdkgTheme\Widgets\WidgetManager();
    }
  }

  public function theme_setup()
  {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ]);

    // Load text domain
    load_child_theme_textdomain('vdkg-theme', get_stylesheet_directory() . '/languages');
  }

  public function enqueue_assets()
  {
    // Enqueue parent theme styles
    wp_enqueue_style(
      'hello-elementor-style',
      get_template_directory_uri() . '/style.css',
      [],
      wp_get_theme()->get('Version')
    );

    // Enqueue compiled theme styles with high priority
    wp_enqueue_style(
      'vdkg-theme-style',
      get_stylesheet_directory_uri() . '/dist/style.css',
      ['hello-elementor-style'],
      filemtime(get_stylesheet_directory() . '/dist/style.css')
    );

    // Enqueue compiled theme script
    if (file_exists(get_stylesheet_directory() . '/dist/main.js')) {
      wp_enqueue_script(
        'vdkg-theme-script',
        get_stylesheet_directory_uri() . '/dist/main.js',
        ['jquery'],
        filemtime(get_stylesheet_directory() . '/dist/main.js'),
        true
      );
    }
  }

  public function enqueue_admin_assets()
  {
    // Enqueue compiled admin styles if available
    if (file_exists(get_stylesheet_directory() . '/dist/admin.css')) {
      wp_enqueue_style(
        'vdkg-theme-admin-style',
        get_stylesheet_directory_uri() . '/dist/admin.css',
        [],
        filemtime(get_stylesheet_directory() . '/dist/admin.css')
      );
    }

    // Enqueue compiled admin script if available
    if (file_exists(get_stylesheet_directory() . '/dist/admin.js')) {
      wp_enqueue_script(
        'vdkg-theme-admin-script',
        get_stylesheet_directory_uri() . '/dist/admin.js',
        ['jquery'],
        filemtime(get_stylesheet_directory() . '/dist/admin.js'),
        true
      );
    }
  }

  private function enable_svg_upload() {
    add_filter('upload_mimes', function ($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    });

    add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext === 'svg') {
            $data['ext'] = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        return $data;
    }, 10, 4);
}
}

// Initialize the theme
VdkgTheme::get_instance();
