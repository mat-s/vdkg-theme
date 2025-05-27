<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\blocker\KlaviyoPreset as BlockerKlaviyoPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Klaviyo blocker preset.
 */
class KlaviyoPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\KlaviyoPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Klaviyo',
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLAVIYO],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
