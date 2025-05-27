<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\ZendeskChatPreset as PresetsZendeskChatPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\ZendeskChatPreset as BlockerZendeskChatPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Zendesk (Chat) blocker preset.
 */
class ZendeskChatPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\ZendeskChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\ZendeskChatPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
