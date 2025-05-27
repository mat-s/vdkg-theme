<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\CustomTwitterFeedPreset as ProCustomTwitterFeedPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Custom Twitter Feed (Custom Twitter Feeds (Tweets Widget)) preset.
 */
class CustomTwitterFeedPreset extends \DevOwl\RealCookieBanner\presets\pro\CustomTwitterFeedPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\TwitterTweetPreset::IDENTIFIER,
                'technicalHandlingNotice' => __(
                    'There is no need for an opt-in script. In addition to this cookie, please create a content blocker that automatically blocks content from Twitter.',
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
