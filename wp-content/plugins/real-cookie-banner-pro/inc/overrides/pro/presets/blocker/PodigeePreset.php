<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\PodigeePreset as PresetsPodigeePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PodigeePreset as BlockerPodigeePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Podigee blocker preset.
 */
class PodigeePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PodigeePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\PodigeePreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'audio-player',
                    'shouldForceToShowVisual' => \true
                ],
                $parent['attributes']
            )
        ]);
    }
}
