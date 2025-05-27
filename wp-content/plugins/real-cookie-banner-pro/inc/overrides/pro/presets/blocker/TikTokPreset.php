<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TikTokPreset as PresetsTikTokPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\TikTokPreset as BlockerTikTokPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * TikTok blocker preset.
 */
class TikTokPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\TikTokPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\TikTokPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-video'
                ],
                $parent['attributes']
            )
        ]);
    }
}
