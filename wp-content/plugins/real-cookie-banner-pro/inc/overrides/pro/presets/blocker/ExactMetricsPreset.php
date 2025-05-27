<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset as PresetsExactMetricsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\ExactMetricsPreset as BlockerExactMetricsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * ExactMetrics preset -> Google Analytics blocker preset.
 */
class ExactMetricsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\ExactMetricsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
