<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MonsterInsights4Preset as PresetsMonsterInsights4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MonsterInsights4Preset as BlockerMonsterInsights4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * MonsterInsights preset -> Google Analytics (V4) blocker preset.
 */
class MonsterInsights4Preset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MonsterInsights4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MonsterInsights4Preset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
