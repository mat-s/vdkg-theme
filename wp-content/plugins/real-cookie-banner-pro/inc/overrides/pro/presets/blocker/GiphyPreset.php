<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GiphyPreset as PresetsGiphyPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GiphyPreset as BlockerGiphyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Giphy blocker preset.
 */
class GiphyPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GiphyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GiphyPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'shouldForceToShowVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'generic'
                ],
                $parent['attributes']
            )
        ]);
    }
}
