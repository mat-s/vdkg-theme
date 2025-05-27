<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MatomoPluginPreset as PresetsMatomoPluginPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MatomoPluginPreset as BlockerMatomoPluginPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Matomo Plugin blocker preset.
 */
class MatomoPluginPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MatomoPluginPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MatomoPluginPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
