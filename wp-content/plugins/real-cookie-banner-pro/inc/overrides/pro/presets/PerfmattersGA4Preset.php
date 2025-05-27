<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\PerfmattersGA4Preset as ProPerfmattersGA4Preset;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Perfmatters Google Analytics Integration preset -> Google Analytics (Analytics 4) cookie preset.
 */
class PerfmattersGA4Preset extends \DevOwl\RealCookieBanner\presets\pro\PerfmattersGA4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\GoogleAnalytics4Preset::IDENTIFIER,
                'shouldRemoveTechnicalHandlingWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    [\DevOwl\RealCookieBanner\lite\presets\PerfmattersGAPreset::SLUG]
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
