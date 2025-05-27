<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\PiwikProPreset as PresetsPiwikProPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PiwikProPreset as BlockerPiwikProPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Piwik PRO blocker preset.
 */
class PiwikProPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PiwikProPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\PiwikProPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
