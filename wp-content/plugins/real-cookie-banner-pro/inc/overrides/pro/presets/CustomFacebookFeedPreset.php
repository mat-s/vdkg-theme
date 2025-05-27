<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\CustomFacebookFeedPreset as ProCustomFacebookFeedPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Custom Facebook Feed (Smash Balloon Social Post Feed) preset.
 */
class CustomFacebookFeedPreset extends \DevOwl\RealCookieBanner\presets\pro\CustomFacebookFeedPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'Facebook CDN',
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Our Facebook feeds use Facebook CDN (Content Delivery Network). The CDN refers to a geographically distributed group of servers to provide fast delivery of content like images and videos. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Meta Platforms Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://www.facebook.com/about/privacy',
                'isEmbeddingOnlyExternalResources' => \true,
                'technicalHandlingNotice' => __(
                    'There is no need for an opt-in script. In addition to this cookie, please create a content blocker that automatically blocks content from Facebook CDN.',
                    RCB_TD
                ),
                'ePrivacyUSA' => \true
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
