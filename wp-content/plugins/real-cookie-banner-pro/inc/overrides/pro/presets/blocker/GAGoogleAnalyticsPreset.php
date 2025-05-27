<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\GAGoogleAnalyticsPreset as PresetsGAGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GAGoogleAnalyticsPreset as BlockerGAGoogleAnalyticsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * GA Google Analytics preset -> Google Analytics blocker preset.
 */
class GAGoogleAnalyticsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GAGoogleAnalyticsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GAGoogleAnalyticsPreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
