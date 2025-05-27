<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\BloomPreset as PresetsBloomPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\BloomPreset as BlockerBloomPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Bloom blocker preset.
 */
class BloomPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\BloomPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\BloomPreset::IDENTIFIER,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_RECAPTCHA
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
