<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\ExactMetrics4Preset as PresetsExactMetrics4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\ExactMetrics4Preset as BlockerExactMetrics4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * ExactMetrics preset -> Google Analytics (V4) blocker preset.
 */
class ExactMetrics4Preset extends \DevOwl\RealCookieBanner\presets\pro\blocker\ExactMetrics4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\ExactMetrics4Preset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
