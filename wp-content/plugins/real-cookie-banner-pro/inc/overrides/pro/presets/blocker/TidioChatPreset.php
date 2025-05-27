<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\TidioChatPreset as PresetsTidioChatPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\TidioChatPreset as BlockerTidioChatPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Tidio Chat blocker preset.
 */
class TidioChatPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\TidioChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\TidioChatPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
