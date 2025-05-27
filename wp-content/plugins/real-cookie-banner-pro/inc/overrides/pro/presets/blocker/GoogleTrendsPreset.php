<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GoogleTrendsPreset as PresetsGoogleTrendsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GoogleTrendsPreset as BlockerGoogleTrendsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Trends blocker preset.
 */
class GoogleTrendsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleTrendsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleTrendsPreset::IDENTIFIER],
                    'shouldForceToShowVisual' => \true
                ],
                $parent['attributes']
            )
        ]);
    }
}
