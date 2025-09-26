<?php
namespace VdkgTheme\Widgets;

/**
 * Widget Manager für Custom Elementor Widgets
 */
class WidgetManager {
    
    /**
     * Initialize widget manager
     */
    public function __construct() {
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'register_widget_categories']);
    }
    
    /**
     * Register custom widget categories
     */
    public function register_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'vdkg-theme',
            [
                'title' => esc_html__('VDKG Theme', 'vdkg-theme'),
                'icon' => 'fa fa-plug',
            ]
        );
    }
    
    /**
     * Register custom widgets
     */
    public function register_widgets($widgets_manager) {
        // Base theme: no custom widgets registered by default.
        // Add your widgets here in future projects.
    }
}
