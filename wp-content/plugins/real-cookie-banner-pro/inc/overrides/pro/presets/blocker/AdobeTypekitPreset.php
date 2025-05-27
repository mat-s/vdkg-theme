<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\AdobeTypekitPreset as PresetsAdobeTypekitPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\AdobeTypekitPreset as BlockerAdobeTypekitPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Adobe Typekit blocker preset.
 */
class AdobeTypekitPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\AdobeTypekitPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\AdobeTypekitPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
