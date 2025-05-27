<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset as ProAnalytifyPreset;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Analytify preset -> Google Analytics cookie preset.
 */
class AnalytifyPreset extends \DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\GoogleAnalyticsPreset::IDENTIFIER,
                'shouldRemoveTechnicalHandlingWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    [self::SLUG_FREE, self::SLUG_PRO]
                ),
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'Please do not forget to activate the option <a href="%s" target="_blank">Anonymize IP Addresses</a> in Analytify to comply with the GDPR. If you enable the "Setup Cross-domain Tracking" feature, you must also set the corresponding additional cookies here.',
                        RCB_TD
                    ),
                    admin_url('admin.php?page=analytify-settings#wp-analytify-profile')
                )
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
