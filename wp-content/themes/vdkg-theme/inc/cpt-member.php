<?php
/**
 * Custom Post Type: Member
 *
 * Registers a CPT to represent the association's members.
 */

if (!defined('ABSPATH')) { exit; }

add_action('init', function () {
    $labels = [
        'name'                  => _x('Mitglieder', 'Post type general name', 'vdkg-theme'),
        'singular_name'         => _x('Mitglied', 'Post type singular name', 'vdkg-theme'),
        'menu_name'             => _x('Mitglieder', 'Admin Menu text', 'vdkg-theme'),
        'name_admin_bar'        => _x('Mitglied', 'Add New on Toolbar', 'vdkg-theme'),
        'add_new'               => __('Neu hinzufügen', 'vdkg-theme'),
        'add_new_item'          => __('Neues Mitglied hinzufügen', 'vdkg-theme'),
        'new_item'              => __('Neues Mitglied', 'vdkg-theme'),
        'edit_item'             => __('Mitglied bearbeiten', 'vdkg-theme'),
        'view_item'             => __('Mitglied ansehen', 'vdkg-theme'),
        'all_items'             => __('Alle Mitglieder', 'vdkg-theme'),
        'search_items'          => __('Mitglieder suchen', 'vdkg-theme'),
        'parent_item_colon'     => __('Übergeordnetes Mitglied:', 'vdkg-theme'),
        'not_found'             => __('Keine Mitglieder gefunden.', 'vdkg-theme'),
        'not_found_in_trash'    => __('Keine Mitglieder im Papierkorb.', 'vdkg-theme'),
        'featured_image'        => _x('Profilbild', 'member featured image', 'vdkg-theme'),
        'set_featured_image'    => _x('Profilbild festlegen', 'member featured image', 'vdkg-theme'),
        'remove_featured_image' => _x('Profilbild entfernen', 'member featured image', 'vdkg-theme'),
        'use_featured_image'    => _x('Als Profilbild verwenden', 'member featured image', 'vdkg-theme'),
        'archives'              => _x('Mitglieder-Archiv', 'member archives', 'vdkg-theme'),
        'insert_into_item'      => _x('In Mitglied einfügen', 'member', 'vdkg-theme'),
        'uploaded_to_this_item' => _x('Zu diesem Mitglied hochgeladen', 'member', 'vdkg-theme'),
        'filter_items_list'     => _x('Mitgliederliste filtern', 'member', 'vdkg-theme'),
        'items_list_navigation' => _x('Navigation Mitgliederliste', 'member', 'vdkg-theme'),
        'items_list'            => _x('Mitgliederliste', 'member', 'vdkg-theme'),
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true, // Gutenberg + REST API
        'rest_base'           => 'members',
        'menu_icon'           => 'dashicons-groups',
        'query_var'           => true,
        'rewrite'             => [ 'slug' => 'mitglieder', 'with_front' => false ],
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'has_archive'         => 'mitglieder',
        'hierarchical'        => false,
        'menu_position'       => 20,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
    ];

    register_post_type('member', $args);
});

// Flush rewrite rules once after theme activation to register archive/single URLs
add_action('after_switch_theme', function () {
    // Ensure CPT is registered prior to flushing
    if (!post_type_exists('member')) {
        do_action('init');
    }
    flush_rewrite_rules();
});

