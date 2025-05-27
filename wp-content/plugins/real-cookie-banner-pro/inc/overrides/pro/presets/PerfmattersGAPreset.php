<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\PerfmattersGAPreset as ProPerfmattersGAPreset;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Perfmatters Google Analytics preset -> Google Analytics cookie preset.
 */
class PerfmattersGAPreset extends \DevOwl\RealCookieBanner\presets\pro\PerfmattersGAPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\GoogleAnalyticsPreset::IDENTIFIER,
                'shouldRemoveTechnicalHandlingWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    [self::SLUG]
                ),
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'Please do not forget to activate the option <a href="%s" target="_blank">Anonymize IP Addresses</a> in Perfmatters to comply with the GDPR.',
                        RCB_TD
                    ),
                    admin_url('options-general.php?page=perfmatters&tab=ga')
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
