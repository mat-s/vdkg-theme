<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\IntercomChatPreset as PresetsIntercomChatPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\IntercomChatPreset as BlockerIntercomChatPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Intercom (Chat) blocker preset.
 */
class IntercomChatPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\IntercomChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\IntercomChatPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
