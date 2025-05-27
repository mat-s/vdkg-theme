<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\GoogleAnalytics4Preset as PresetsGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalytics4Preset as BlockerGoogleAnalytics4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Analytics (V4) blocker preset.
 */
class GoogleAnalytics4Preset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalytics4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleAnalytics4Preset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
