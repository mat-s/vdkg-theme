<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset as PresetsRankMathGAPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\RankMathGAPreset as BlockerRankMathGAPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * RankMath Google Analytics preset -> Google Analytics blocker preset.
 */
class RankMathGAPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\RankMathGAPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
