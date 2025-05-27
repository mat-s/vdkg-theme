<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsPreset as PresetsWooCommerceGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\WooCommerceGoogleAnalyticsPreset as BlockerWooCommerceGoogleAnalyticsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce Google Analytics Integration preset -> Google Analytics blocker preset.
 */
class WooCommerceGoogleAnalyticsPreset extends
    \DevOwl\RealCookieBanner\presets\pro\blocker\WooCommerceGoogleAnalyticsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsPreset::IDENTIFIER
                    ]
                ],
                $parent['attributes']
            )
        ]);
    }
}
