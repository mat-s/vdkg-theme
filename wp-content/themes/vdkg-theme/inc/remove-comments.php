<?php
/**
 * Completely disables WordPress comments on all post types.
 *
 * Removes support for comments and trackbacks, hides comment forms,
 * removes admin menu items and redirects comment pages.
 *
 * @return void
 */
function remove_comment_features() {
  // Disable support for comments and trackbacks in post types
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }

  // Close comments on the front-end
  add_filter('comments_open', '__return_false', 20, 2);
  add_filter('pings_open', '__return_false', 20, 2);

  // Hide existing comments
  add_filter('comments_array', '__return_empty_array', 10, 2);

  // Remove comments page in menu
  add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
  });

  // Redirect any user trying to access comments page
  add_action('admin_init', function () {
    if (isset($_GET['page']) && $_GET['page'] === 'edit-comments.php') {
      wp_redirect(admin_url());
      exit;
    }
  });

  // Remove comments metabox from dashboard
  add_action('admin_init', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  });

  // Remove comment support from admin bar
  add_action('init', function () {
    if (is_admin_bar_showing()) {
      remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
  });
}
add_action('init', 'remove_comment_features');