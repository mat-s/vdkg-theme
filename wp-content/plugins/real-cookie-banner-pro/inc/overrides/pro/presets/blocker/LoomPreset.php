<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\LoomPreset as PresetsLoomPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\LoomPreset as BlockerLoomPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Loom blocker preset.
 */
class LoomPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\LoomPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\LoomPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'video-player',
                    'shouldForceToShowVisual' => \true
                ],
                $parent['attributes']
            )
        ]);
    }
}
