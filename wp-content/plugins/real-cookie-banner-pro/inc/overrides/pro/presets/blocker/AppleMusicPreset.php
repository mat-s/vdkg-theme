<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AppleMusicPreset as PresetsAppleMusicPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\AppleMusicPreset as BlockerAppleMusicPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Apple Music blocker preset.
 */
class AppleMusicPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\AppleMusicPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\AppleMusicPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'audio-player'
                ],
                $parent['attributes']
            )
        ]);
    }
}
