<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\RedditPreset as PresetsRedditPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\RedditPreset as BlockerRedditPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * reddit blocker preset.
 */
class RedditPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\RedditPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\RedditPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-text'
                ],
                $parent['attributes']
            )
        ]);
    }
}
