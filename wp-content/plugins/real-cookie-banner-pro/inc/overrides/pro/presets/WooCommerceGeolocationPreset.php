<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\WooCommerceGeolocationPreset as ProWooCommerceGeolocationPreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce (Geolocation) cookie preset.
 */
class WooCommerceGeolocationPreset extends \DevOwl\RealCookieBanner\presets\pro\WooCommerceGeolocationPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'WooCommerce is an e-commerce shop system that allows you to buy products on this website. For a better shopping experience, the visitor\'s location is determined based on their IP address. For this purpose, an IP-to-country database stored locally on the server of this website is used for lookup. The country is already filled in during the ordering process, for example. Cookies are used to remember the country from which the visitor comes.',
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
                        'type' => 'http',
                        'name' => 'woocommerce_geo_hash',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ]
                ],
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'You need consent for certain features of WooCommerce, which evaluate the IP address of your visitors using the MaxMind Geolocation integration.',
                        RCB_TD
                    ),
                    \sprintf(
                        // translators:
                        __(
                            'Probably in the <a href="%s" target="_blank">WooCommerce settings</a> you have chosen a "Default customer location" based on the location of your visitors.',
                            RCB_TD
                        ),
                        admin_url('admin.php?page=wc-settings&tab=general')
                    )
                ]),
                'deleteTechnicalDefinitionsAfterOptOut' => \true
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
