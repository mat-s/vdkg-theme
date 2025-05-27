<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MyFontsPreset as PresetsMyFontsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MyFontsPreset as BlockerMyFontsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * MyFonts.net blocker preset.
 */
class MyFontsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MyFontsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MyFontsPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
