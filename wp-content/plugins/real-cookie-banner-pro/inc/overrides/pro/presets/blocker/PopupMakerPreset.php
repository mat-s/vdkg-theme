<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\PopupMakerPreset as PresetsPopupMakerPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PopupMakerPreset as BlockerPopupMakerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Popup Maker blocker preset.
 */
class PopupMakerPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PopupMakerPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\PopupMakerPreset::IDENTIFIER,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_FONTS
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
