<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\WooCommercePreset as ProWooCommercePreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce cookie preset.
 */
class WooCommercePreset extends \DevOwl\RealCookieBanner\presets\pro\WooCommercePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'WooCommerce is an e-commerce shop system that allows you to buy products on this website. Cookies are used to collect items in a shopping cart, to store the shopping cart of the user in the database of the website, to store recently viewed products to show them again and to allow users to dismiss notices in the online shop.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => get_bloginfo('name'),
                'providerPrivacyPolicyUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getPrivacyPolicyUrl(
                    ''
                ),
                'providerLegalNoticeUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getImprintPageUrl(
                    ''
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'wc_cart_hash_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'woocommerce_cart_hash',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'wp_woocommerce_session_*',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'woocommerce_items_in_cart',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'woocommerce_recently_viewed',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    5 => [
                        'type' => 'http',
                        'name' => 'store_notice*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \join(' ', [
                    __(
                        'The defined cookies are only cookies from WooCommerce itself. If you use plugins to extend your WooCommerce shop, they can set additional cookies. Make sure that you also mention these in the technical definitions above or in an additional cookie entry.',
                        RCB_TD
                    ),
                    \sprintf(
                        '<a href="%s" target="_blank">%s</a>',
                        esc_attr(__('https://devowl.io/2021/woocommerce-cookies-gdpr/', RCB_TD)),
                        \sprintf(
                            // translators:
                            __('Learn more about %s and the GDPR!', RCB_TD),
                            'WooCommerce'
                        )
                    )
                ]),
                'deleteTechnicalDefinitionsAfterOptOut' => \false
            ]
        ]);
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
