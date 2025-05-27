<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MouseflowPreset as PresetsMouseflowPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MouseflowPreset as BlockerMouseflowPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Mouseflow blocker preset.
 */
class MouseflowPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MouseflowPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MouseflowPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
