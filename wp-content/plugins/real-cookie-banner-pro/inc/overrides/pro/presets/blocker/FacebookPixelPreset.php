<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\FacebookPixelPreset as PresetsFacebookPixelPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset as BlockerFacebookPixelPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Pixel blocker preset.
 */
class FacebookPixelPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FacebookPixelPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
