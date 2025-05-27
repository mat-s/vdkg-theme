<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\CustomFacebookFeedPreset as PresetsCustomFacebookFeedPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\CustomFacebookFeedPreset as BlockerCustomFacebookFeedPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Custom Facebook Feed (Smash Balloon Social Post Feed) blocker preset.
 */
class CustomFacebookFeedPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\CustomFacebookFeedPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\CustomFacebookFeedPreset::IDENTIFIER,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FONTAWESOME,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDPRESS_EMOJIS
                    ],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-text'
                ],
                $parent['attributes']
            )
        ]);
    }
}
