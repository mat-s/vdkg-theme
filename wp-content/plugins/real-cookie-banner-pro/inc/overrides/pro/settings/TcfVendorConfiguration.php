<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\settings\Cookie;
use DevOwl\RealCookieBanner\settings\Revision;
use WP_Error;
use WP_Post;
use WP_REST_Posts_Controller;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Register TCF vendor configuration custom post type.
 */
class TcfVendorConfiguration {
    use UtilsProvider;
    const CPT_NAME = 'rcb-tcf-vendor-conf';
    // Post type names must be between 1 and 20 characters in length
    const META_NAME_VENDOR_ID = 'vendorId';
    const META_NAME_RESTRICTIVE_PURPOSES = 'restrictivePurposes';
    const META_NAME_EPRIVACY_USA = \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EPRIVACY_USA;
    const EPRIVACY_USA_UNKNOWN = 2;
    const EPRIVACY_USA_YES = 0;
    const EPRIVACY_USA_NO = 1;
    const SYNC_OPTIONS_COPY_AND_COPY_ONCE = [
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_VENDOR_ID,
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_RESTRICTIVE_PURPOSES,
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_EPRIVACY_USA
    ];
    const SYNC_OPTIONS = [
        'meta' => [
            'copy' => \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::SYNC_OPTIONS_COPY_AND_COPY_ONCE,
            'copy-once' =>
                \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::SYNC_OPTIONS_COPY_AND_COPY_ONCE
        ]
    ];
    const META_KEYS = [
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_VENDOR_ID,
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_RESTRICTIVE_PURPOSES,
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_EPRIVACY_USA
    ];
    /**
     * Singleton instance.
     *
     * @var TcfVendorConfiguration
     */
    private static $me = null;
    private $cacheGetOrdered = [];
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Register capabilities to administrator role to allow TCF vendor configuration management.
     *
     * @see https://wordpress.stackexchange.com/a/290093/83335
     * @see https://wordpress.stackexchange.com/a/257401/83335
     */
    public function register_cap() {
        foreach (wp_roles()->roles as $key => $value) {
            $role = get_role($key);
            if ($role->has_cap('manage_options')) {
                foreach (\DevOwl\RealCookieBanner\settings\Cookie::CAPABILITIES as $cap) {
                    $role->add_cap(\sprintf($cap, self::CPT_NAME));
                }
            }
        }
    }
    /**
     * Register custom post type.
     */
    public function register() {
        $labels = [
            'name' => __('TCF vendor configurations', RCB_TD),
            'singular_name' => __('TCF vendor configuration', RCB_TD)
        ];
        $args = [
            'label' => $labels['name'],
            'labels' => $labels,
            'description' => '',
            'public' => \false,
            'publicly_queryable' => \false,
            'show_ui' => \true,
            'show_in_rest' => \true,
            'rest_base' => self::CPT_NAME,
            'rest_controller_class' => \WP_REST_Posts_Controller::class,
            'has_archive' => \false,
            'show_in_menu' => \false,
            'show_in_nav_menus' => \false,
            'delete_with_user' => \false,
            'exclude_from_search' => \true,
            'capability_type' => self::CPT_NAME,
            'map_meta_cap' => \true,
            'hierarchical' => \false,
            'rewrite' => \false,
            'query_var' => \true,
            'supports' => ['custom-fields']
        ];
        register_post_type(self::CPT_NAME, $args);
        register_meta('post', self::META_NAME_VENDOR_ID, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'number',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        // This meta is stored as JSON (this shouldn't be done usually - 3rd normal form - but it's ok here)
        register_meta('post', self::META_NAME_RESTRICTIVE_PURPOSES, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_EPRIVACY_USA, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'number',
            'single' => \true,
            'default' => self::EPRIVACY_USA_UNKNOWN,
            'show_in_rest' => [
                'schema' => [
                    'type' => 'number',
                    'enum' => [self::EPRIVACY_USA_UNKNOWN, self::EPRIVACY_USA_NO, self::EPRIVACY_USA_YES]
                ]
            ]
        ]);
    }
    /**
     * Get all available configurations ordered.
     *
     * @param boolean $force
     * @param WP_Post[] $usePosts If set, only meta is applied to the passed posts
     * @return WP_Post[]|WP_Error
     */
    public function getOrdered($force = \false, $usePosts = null) {
        $context = \DevOwl\RealCookieBanner\settings\Revision::getInstance()->getContextVariablesString();
        if ($force === \false && isset($this->cacheGetOrdered[$context]) && $usePosts === null) {
            return $this->cacheGetOrdered[$context];
        }
        $posts =
            $usePosts === null
                ? get_posts(
                    \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                        [
                            'post_type' => self::CPT_NAME,
                            'numberposts' => -1,
                            'nopaging' => \true,
                            'post_status' => 'publish'
                        ],
                        'tcfVendorConfigurationsGetOrdered'
                    )
                )
                : $usePosts;
        foreach ($posts as &$post) {
            $post->metas = [];
            foreach (self::META_KEYS as $meta_key) {
                $metaValue = get_post_meta($post->ID, $meta_key, \true);
                switch ($meta_key) {
                    case self::META_NAME_RESTRICTIVE_PURPOSES:
                        $metaValue = \json_decode($metaValue, ARRAY_A);
                        break;
                    case self::META_NAME_VENDOR_ID:
                        $metaValue = \intval($metaValue);
                        break;
                    case self::META_NAME_EPRIVACY_USA:
                        $metaValue = \intval($metaValue);
                        break;
                    default:
                        break;
                }
                $post->metas[$meta_key] = $metaValue;
            }
        }
        if ($usePosts === null) {
            $this->cacheGetOrdered[$context] = $posts;
        }
        return $posts;
    }
    /**
     * Get a total count of all TCF vendor configurations.
     *
     * @return int
     */
    public function getAllCount() {
        return \array_sum(\array_map('intval', \array_values((array) wp_count_posts(self::CPT_NAME))));
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration())
            : self::$me;
    }
}
