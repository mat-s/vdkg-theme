<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\KomootPreset as PresetsKomootPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\KomootPreset as BlockerKomootPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Komoot blocker preset.
 */
class KomootPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\KomootPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'The tour, shown on a map from Komoot, could not be loaded because you did not agree to load the service.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\KomootPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'map'
                ],
                $parent['attributes']
            )
        ]);
    }
}
