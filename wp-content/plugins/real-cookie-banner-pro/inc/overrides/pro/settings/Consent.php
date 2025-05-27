<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\settings\Consent as SettingsConsent;
use DevOwl\RealCookieBanner\settings\General;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
trait Consent {
    // Documented in IOverrideGeneral
    public function overrideEnableOptionsAutoload() {
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\Consent::SETTING_EPRIVACY_USA,
            \DevOwl\RealCookieBanner\settings\Consent::DEFAULT_EPRIVACY_USA,
            'boolval'
        );
    }
    // Documented in IOverrideConsent
    public function overrideRegister() {
        register_setting(
            \DevOwl\RealCookieBanner\settings\Consent::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\Consent::SETTING_EPRIVACY_USA,
            ['type' => 'boolean', 'show_in_rest' => \true]
        );
    }
    // Documented in IOverrideMultisite
    public function isEPrivacyUSAEnabled() {
        return get_option(\DevOwl\RealCookieBanner\settings\Consent::SETTING_EPRIVACY_USA);
    }
}
