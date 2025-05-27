<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\TawkToChatPreset as PresetsTawkToChatPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\TawkToChatPreset as BlockerTawkToChatPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Tawk.to Chat blocker preset.
 */
class TawkToChatPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\TawkToChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\TawkToChatPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
