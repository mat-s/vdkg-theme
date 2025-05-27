<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\MatomoIntegrationPluginPreset as ProMatomoIntegrationPluginPreset;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WP-Matomo Integration (former WP-Piwik) cookie preset.
 */
class MatomoIntegrationPluginPreset extends \DevOwl\RealCookieBanner\presets\pro\MatomoIntegrationPluginPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\MatomoPreset::IDENTIFIER,
                'shouldRemoveTechnicalHandlingWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    [self::SLUG]
                ),
                'technicalHandlingNotice' => __(
                    'Matomo is integrated into your website via the <strong>WP-Matomo Integration (WP-Piwik)</strong> plugin and blocked via a content blocker before consent. <strong>Please make sure that the option to load Matomo via WP-Matomo Integration is <u>not</u> deactivated.</strong> Therefore, you do not need an opt-in code.',
                    RCB_TD
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
