<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset as PresetsWooCommerceGoogleAnalyticsProPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\WooCommerceGoogleAnalyticsProPreset as BlockerWooCommerceGoogleAnalyticsProPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce Google Analytics Pro preset -> Google Analytics blocker preset.
 */
class WooCommerceGoogleAnalyticsProPreset extends
    \DevOwl\RealCookieBanner\presets\pro\blocker\WooCommerceGoogleAnalyticsProPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset::IDENTIFIER
                    ]
                ],
                $parent['attributes']
            )
        ]);
    }
}
