<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\InstagramPostPreset as PresetsInstagramPostPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\InstagramPostPreset as BlockerInstagramPostPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Instgram (post) blocker preset.
 */
class InstagramPostPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\InstagramPostPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Instagram (embedded post)',
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\InstagramPostPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-video'
                ],
                $parent['attributes']
            )
        ]);
    }
}
