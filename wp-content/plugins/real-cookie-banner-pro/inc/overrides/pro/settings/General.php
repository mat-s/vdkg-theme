<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\settings\General as SettingsGeneral;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
trait General {
    // Documented in IOverrideGeneral
    public function overrideEnableOptionsAutoload() {
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\General::SETTING_HIDE_PAGE_IDS,
            \DevOwl\RealCookieBanner\settings\General::DEFAULT_HIDE_PAGE_IDS
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\General::SETTING_SET_COOKIES_VIA_MANAGER,
            \DevOwl\RealCookieBanner\settings\General::DEFAULT_SET_COOKIES_VIA_MANAGER
        );
    }
    // Documented in IOverrideMultisite
    public function overrideRegister() {
        // WP < 5.3 does not support array types yet, so we need to store serialized
        register_setting(
            \DevOwl\RealCookieBanner\settings\General::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\General::SETTING_HIDE_PAGE_IDS,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\General::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\General::SETTING_SET_COOKIES_VIA_MANAGER,
            ['type' => 'string', 'show_in_rest' => \true]
        );
    }
    // Documented in IOverrideMultisite
    public function getAdditionalPageHideIds() {
        $ids = get_option(\DevOwl\RealCookieBanner\settings\General::SETTING_HIDE_PAGE_IDS);
        if (empty($ids)) {
            return [];
        }
        return \array_map('absint', \explode(',', $ids));
    }
    // Documented in IOverrideMultisite
    public function getSetCookiesViaManager() {
        return get_option(\DevOwl\RealCookieBanner\settings\General::SETTING_SET_COOKIES_VIA_MANAGER);
    }
}
