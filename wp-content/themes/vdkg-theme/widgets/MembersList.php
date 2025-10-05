<?php

namespace VdkgTheme\Widgets;

use Elementor\Widget_Base;
use WP_Query;

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Elementor widget: VDKG Members List
 *
 * Lists all posts from CPT `member` alphabetically in 3 columns.
 */
class MembersList extends Widget_Base
{
  public function get_name()
  {
    return 'vdkg_members_list';
  }

  public function get_title()
  {
    return __('VDKG Mitglieder-Liste', 'vdkg-theme');
  }

  public function get_icon()
  {
    return 'eicon-bullet-list';
  }

  public function get_categories()
  {
    return ['vdkg-theme'];
  }

  public function get_keywords()
  {
    return ['vdkg', 'members', 'mitglieder', 'list', 'posts'];
  }

  // No controls needed for now; purely dynamic output
  protected function _register_controls() {}

  protected function render()
  {
    // Query all published members, order by title A→Z
    $q = new WP_Query([
      'post_type'      => 'member',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'orderby'        => 'title',
      'order'          => 'ASC',
      'no_found_rows'  => true,
      'fields'         => 'ids', // optimize
    ]);

    if (!$q->have_posts()) {
      return;
    }

    echo '<div class="vdkg-members-list">';
    echo '<ul class="vdkg-members-list__grid">';
    foreach ($q->posts as $post_id) {
      $title = get_the_title($post_id);
      $url   = get_permalink($post_id);
      echo '<li class="vdkg-members-list__item">';
      echo '<a class="vdkg-members-list__link" href="' . esc_url($url) . '">' . esc_html($title) . '</a>';
      echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
  }

  protected function content_template()
  {
    // Editor preview: show placeholder when no query available
?>
    <div class="vdkg-members-list">
      <ul class="vdkg-members-list__grid">
        <li class="vdkg-members-list__item"><a class="vdkg-members-list__link" href="#">Lorem Ipsum</a></li>
        <li class="vdkg-members-list__item"><a class="vdkg-members-list__link" href="#">Ipsum Lore</a></li>
        <li class="vdkg-members-list__item"><a class="vdkg-members-list__link" href="#">Mit Lore Ipsum</a></li>
        <li class="vdkg-members-list__item"><a class="vdkg-members-list__link" href="#">Aenean Egestas</a></li>
        <li class="vdkg-members-list__item"><a class="vdkg-members-list__link" href="#">Vestibulum</a></li>
        <li class="vdkg-members-list__item"><a class="vdkg-members-list__link" href="#">Nulla Facilisi</a></li>
      </ul>
    </div>
<?php
  }
}
