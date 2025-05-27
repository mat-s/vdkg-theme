<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset as PresetsMonsterInsightsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MonsterInsightsPreset as BlockerMonsterInsightsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * MonsterInsights preset -> Google Analytics blocker preset.
 */
class MonsterInsightsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MonsterInsightsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
