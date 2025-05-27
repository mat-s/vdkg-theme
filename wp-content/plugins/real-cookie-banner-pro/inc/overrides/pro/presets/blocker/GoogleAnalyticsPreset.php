<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\GoogleAnalyticsPreset as PresetsGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset as BlockerGoogleAnalyticsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Analytics (UA) blocker preset.
 */
class GoogleAnalyticsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleAnalyticsPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
