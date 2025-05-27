<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\DailyMotionPreset as PresetsDailyMotionPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\DailyMotionPreset as BlockerDailyMotionPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Dailymotion blocker preset.
 */
class DailyMotionPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\DailyMotionPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\DailyMotionPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'shouldForceToShowVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'video-player'
                ],
                $parent['attributes']
            )
        ]);
    }
}
