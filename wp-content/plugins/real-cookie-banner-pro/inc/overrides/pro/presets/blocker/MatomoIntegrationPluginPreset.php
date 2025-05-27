<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MatomoIntegrationPluginPreset as PresetsMatomoIntegrationPluginPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MatomoIntegrationPluginPreset as BlockerMatomoIntegrationPluginPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WP-Matomo Integration (former WP-Piwik) blocker preset.
 */
class MatomoIntegrationPluginPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MatomoIntegrationPluginPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\MatomoIntegrationPluginPreset::IDENTIFIER
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
