<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\SoundCloudPreset as PresetsSoundCloudPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\SoundCloudPreset as BlockerSoundCloudPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * SoundCloud blocker preset.
 */
class SoundCloudPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\SoundCloudPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\SoundCloudPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'audio-player'
                ],
                $parent['attributes']
            )
        ]);
    }
}
