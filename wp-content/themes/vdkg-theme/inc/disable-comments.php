<?php
/**
 * Disable all WordPress comment functionality across frontend and admin.
 */

if (!defined('ABSPATH')) {
    exit;
}

// Remove support for comments and trackbacks from all post types
add_action('admin_init', function () {
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
        }
        if (post_type_supports($post_type, 'trackbacks')) {
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments and pings on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove Comments page in admin
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Redirect any user trying to access comments page
add_action('admin_init', function () {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
});

// Remove comments metabox from dashboard
add_action('admin_init', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

// Remove comments from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

// Dequeue/deregister comment-reply script if enqueued by core or plugins
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('comment-reply');
    wp_dequeue_script('comment-reply');
}, 100);

// Unregister Recent Comments widget and related styles
add_action('widgets_init', function () {
    if (class_exists('WP_Widget_Recent_Comments')) {
        unregister_widget('WP_Widget_Recent_Comments');
    }
    add_filter('show_recent_comments_widget_style', '__return_false');
}, 11);

// Disable REST API endpoints for comments
add_filter('rest_endpoints', function ($endpoints) {
    if (isset($endpoints['/wp/v2/comments'])) {
        unset($endpoints['/wp/v2/comments']);
    }
    return $endpoints;
});

// Remove X-Pingback HTTP header
add_filter('wp_headers', function ($headers) {
    if (isset($headers['X-Pingback'])) {
        unset($headers['X-Pingback']);
    }
    return $headers;
});

// Disable XML-RPC pingbacks
add_filter('xmlrpc_methods', function ($methods) {
    if (isset($methods['pingback.ping'])) {
        unset($methods['pingback.ping']);
    }
    return $methods;
});

