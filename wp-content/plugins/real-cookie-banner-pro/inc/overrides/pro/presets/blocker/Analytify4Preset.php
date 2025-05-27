<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\Analytify4Preset as PresetsAnalytify4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\Analytify4Preset as BlockerAnalytify4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Analytify preset -> Google Analytics (V4) blocker preset.
 */
class Analytify4Preset extends \DevOwl\RealCookieBanner\presets\pro\blocker\Analytify4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\Analytify4Preset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
