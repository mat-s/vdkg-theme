<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalytics4Preset as ProWooCommerceGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce Google Analytics Integration preset -> Google Analytics (Analytics 4) cookie preset.
 */
class WooCommerceGoogleAnalytics4Preset extends \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalytics4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\GoogleAnalytics4Preset::IDENTIFIER,
                'shouldRemoveTechnicalHandlingWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    [\DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalyticsPreset::SLUG_FREE]
                ),
                'technicalHandlingNotice' => null
            ]
        ]);
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
