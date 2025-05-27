<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\BingMapsPreset as PresetsBingMapsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\BingMapsPreset as BlockerBingMapsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Bing Maps blocker preset.
 */
class BingMapsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\BingMapsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\BingMapsPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'map'
                ],
                $parent['attributes']
            )
        ]);
    }
}
