<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset as PresetsAnalytifyPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\AnalytifyPreset as BlockerAnalytifyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Analytify preset -> Google Analytics blocker preset.
 */
class AnalytifyPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\AnalytifyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
