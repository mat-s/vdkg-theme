<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\PerfmattersGAPreset as PresetsPerfmattersGAPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PerfmattersGAPreset as BlockerPerfmattersGAPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Perfmatters Google Analytics preset -> Google Analytics blocker preset.
 */
class PerfmattersGAPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PerfmattersGAPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\PerfmattersGAPreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
