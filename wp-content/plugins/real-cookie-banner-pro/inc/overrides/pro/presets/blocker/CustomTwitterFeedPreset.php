<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\CustomTwitterFeedPreset as PresetsCustomTwitterFeedPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\CustomTwitterFeedPreset as BlockerCustomTwitterFeedPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Custom Twitter Feed (Custom Twitter Feeds (Tweets Widget)) blocker preset.
 */
class CustomTwitterFeedPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\CustomTwitterFeedPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\CustomTwitterFeedPreset::IDENTIFIER,
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
