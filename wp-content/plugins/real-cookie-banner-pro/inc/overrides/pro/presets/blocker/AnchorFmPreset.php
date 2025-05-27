<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AnchorFmPreset as PresetsAnchorFmPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\AnchorFmPreset as BlockerAnchorFmPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Anchor.fm blocker preset.
 */
class AnchorFmPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\AnchorFmPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\AnchorFmPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'audio-player'
                ],
                $parent['attributes']
            )
        ]);
    }
}
