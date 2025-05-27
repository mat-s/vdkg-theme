<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\blocker\KlikenPreset as BlockerKlikenPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Kliken blocker preset.
 */
class KlikenPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\KlikenPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => __('Kliken and Google Ads', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLIKEN,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_ADS
                    ]
                ],
                $parent['attributes']
            )
        ]);
    }
}
