<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\comp\RevisionContextDependingOption;
use DevOwl\RealCookieBanner\lite\Forwarding;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\settings\Multisite as SettingsMultisite;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
trait Multisite {
    // Documented in IOverrideGeneral
    public function overrideEnableOptionsAutoload() {
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_CONSENT_FORWARDING,
            \DevOwl\RealCookieBanner\settings\Multisite::DEFAULT_CONSENT_FORWARDING,
            'boolval'
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_FORWARD_TO,
            \DevOwl\RealCookieBanner\settings\Multisite::DEFAULT_FORWARD_TO
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_CROSS_DOMAINS,
            \DevOwl\RealCookieBanner\settings\Multisite::DEFAULT_CROSS_DOMAINS
        );
        // Make options context-dependent
        new \DevOwl\RealCookieBanner\comp\RevisionContextDependingOption(
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_FORWARD_TO,
            \DevOwl\RealCookieBanner\settings\Multisite::DEFAULT_FORWARD_TO
        );
        new \DevOwl\RealCookieBanner\comp\RevisionContextDependingOption(
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_CROSS_DOMAINS,
            \DevOwl\RealCookieBanner\settings\Multisite::DEFAULT_CROSS_DOMAINS
        );
        add_action('updated_option', [$this, 'updated_option_forward_to']);
    }
    // Documented in IOverrideMultisite
    public function overrideRegister() {
        register_setting(
            \DevOwl\RealCookieBanner\settings\Multisite::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_CONSENT_FORWARDING,
            ['type' => 'boolean', 'show_in_rest' => \true]
        );
        // WP < 5.3 does not support array types yet, so we need to store serialized
        register_setting(
            \DevOwl\RealCookieBanner\settings\Multisite::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_FORWARD_TO,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\Multisite::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\Multisite::SETTING_CROSS_DOMAINS,
            ['type' => 'string', 'show_in_rest' => \true, 'sanitize_callback' => 'sanitize_textarea_field']
        );
    }
    /**
     * The option "Forward to" got updated. Let's iterate all available sites and activate
     * consent forwarding automatically.
     *
     * @param string $option Name of the updated option
     */
    public function updated_option_forward_to($option) {
        if (
            !\DevOwl\RealCookieBanner\Utils::startsWith(
                $option,
                \DevOwl\RealCookieBanner\settings\Multisite::SETTING_FORWARD_TO
            )
        ) {
            return;
        }
        $forwardTo = $this->getForwardTo();
        if ($forwardTo !== \false && is_multisite()) {
            foreach ($this->getForwardTo() as $url) {
                \parse_str(\parse_url($url, \PHP_URL_QUERY), $result);
                if (isset($result[\DevOwl\RealCookieBanner\lite\Forwarding::QUERY_BLOG_ID])) {
                    $blogId = \intval($result[\DevOwl\RealCookieBanner\lite\Forwarding::QUERY_BLOG_ID]);
                    switch_to_blog($blogId);
                    update_option(\DevOwl\RealCookieBanner\settings\Multisite::SETTING_CONSENT_FORWARDING, \true);
                    restore_current_blog();
                }
            }
        }
    }
    // Documented in IOverrideMultisite
    public function isConsentForwarding() {
        return get_option(\DevOwl\RealCookieBanner\settings\Multisite::SETTING_CONSENT_FORWARDING);
    }
    // Documented in IOverrideMultisite
    public function getForwardTo() {
        if ($this->isConsentForwarding()) {
            $forwardTo = get_option(\DevOwl\RealCookieBanner\settings\Multisite::SETTING_FORWARD_TO);
            return \array_filter(\explode('|', $forwardTo));
        }
        return \false;
    }
    // Documented in IOverrideMultisite
    public function getCrossDomains() {
        if ($this->isConsentForwarding()) {
            $crossDomains = get_option(\DevOwl\RealCookieBanner\settings\Multisite::SETTING_CROSS_DOMAINS);
            return \array_filter(\explode("\n", $crossDomains));
        }
        return \false;
    }
}
