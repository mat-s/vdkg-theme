<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\DiscordWidgetPreset as PresetsDiscordWidgetPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\DiscordWidgetPreset as BlockerDiscordWidgetPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Discord (Widget) blocker preset.
 */
class DiscordWidgetPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\DiscordWidgetPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\DiscordWidgetPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'default',
                    'visualContentType' => 'generic'
                ],
                $parent['attributes']
            )
        ]);
    }
}
