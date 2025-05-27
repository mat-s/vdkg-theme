<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalytics4Preset as PresetsWooCommerceGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\presets\pro\blocker\WooCommerceGoogleAnalytics4Preset as BlockerWooCommerceGoogleAnalytics4Preset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce Google Analytics Integration (V4) preset -> Google Analytics (V4) blocker preset.
 */
class WooCommerceGoogleAnalytics4Preset extends
    \DevOwl\RealCookieBanner\presets\pro\blocker\WooCommerceGoogleAnalytics4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalytics4Preset::IDENTIFIER
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
