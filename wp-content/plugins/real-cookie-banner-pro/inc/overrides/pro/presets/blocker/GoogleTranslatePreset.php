<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\GoogleTranslatePreset as PresetsGoogleTranslatePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GoogleTranslatePreset as BlockerGoogleTranslatePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Translate blocker preset.
 */
class GoogleTranslatePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleTranslatePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleTranslatePreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
