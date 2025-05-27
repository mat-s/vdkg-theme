<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\OpenStreetMapPreset as PresetsOpenStreetMapPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\OpenStreetMapPreset as BlockerOpenStreetMapPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * OpenStreetMap blocker preset.
 */
class OpenStreetMapPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\OpenStreetMapPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\OpenStreetMapPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'map'
                ],
                $parent['attributes']
            )
        ]);
    }
}
