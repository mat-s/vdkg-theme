<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\PerfmattersGA4Preset as PresetsPerfmattersGA4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PerfmattersGA4Preset as BlockerPerfmattersGA4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Perfmatters Google Analytics Integration (V4) preset -> Google Analytics (V4) blocker preset.
 */
class PerfmattersGA4Preset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PerfmattersGA4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\PerfmattersGA4Preset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
