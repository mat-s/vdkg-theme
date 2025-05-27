<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\QuformPreset as ProQuformPreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Quform cookie preset.
 */
class QuformPreset extends \DevOwl\RealCookieBanner\presets\pro\QuformPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Quform allows us to integrate forms, e.g. a contact form, into the website. Cookies are used to assign a unique ID to the current session and to prevent attacks such as sending spam messages.',
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
                        'name' => 'quform_session_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
                'shouldUncheckContentBlockerCheckbox' => \true,
                'createContentBlockerNotice' => __(
                    'Quform itself does not require a content blocker. However, if you use Google reCAPTCHA within the plugin, the forms must be blocked until you have consent for Google reCAPTCHA.',
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
