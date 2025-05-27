<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\WPCerberSecurityPreset as ProWPCerberSecurityPreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WP Cerber Security preset.
 */
class WPCerberSecurityPreset extends \DevOwl\RealCookieBanner\presets\pro\WPCerberSecurityPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'WP Cerber Security secures this website from attacks of various kinds. Cookies are used to distinct logged-in users and non-logged in visitors, as well as search engine bots and spammers, to restrict access to protected areas, the login form, and the WordPress dashboard, and to detect and mitigate malicious activities.',
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
                        'name' => 'security_*',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'The names of the cookies that WP Cerber sets are partly generated completely randomly. Therefore, they are not assignable to WP Cerber for your visitors. You should therefore set the prefix "security_" under <i>WP Cerber > Main Settings > Site-Specific Settings > Prefix for Plugin Cookies</i>. If you prefer a different prefix, you should adjust the technical cookie information above accordingly.',
                    RCB_TD
                )
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
