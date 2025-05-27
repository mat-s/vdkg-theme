<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\VimeoPreset as PresetsVimeoPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\VimeoPreset as BlockerVimeoPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * AddThis Share Buttons blocker preset.
 */
class VimeoPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\VimeoPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\VimeoPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'video-player'
                ],
                $parent['attributes']
            )
        ]);
    }
}
