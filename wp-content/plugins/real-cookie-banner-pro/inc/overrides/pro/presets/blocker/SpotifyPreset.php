<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\SpotifyPreset as PresetsSpotifyPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\SpotifyPreset as BlockerSpotifyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Spotify blocker preset.
 */
class SpotifyPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\SpotifyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\SpotifyPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'audio-player'
                ],
                $parent['attributes']
            )
        ]);
    }
}
