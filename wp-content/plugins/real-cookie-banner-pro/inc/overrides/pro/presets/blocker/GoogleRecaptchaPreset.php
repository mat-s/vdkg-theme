<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\GoogleRecaptchaPreset as PresetsGoogleRecaptchaPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GoogleRecaptchaPreset as BlockerGoogleRecaptchaPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google reCAPTCHA blocker preset.
 */
class GoogleRecaptchaPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleRecaptchaPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleRecaptchaPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
