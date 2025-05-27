<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\RankMathGA4Preset as PresetsRankMathGA4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\RankMathGA4Preset as BlockerRankMathGA4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * RankMath Google Analytics preset -> Google Analytics blocker preset.
 */
class RankMathGA4Preset extends \DevOwl\RealCookieBanner\presets\pro\blocker\RankMathGA4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\RankMathGA4Preset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
