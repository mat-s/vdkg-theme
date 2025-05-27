<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\PinterestPreset as PresetsPinterestPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PinterestPreset as BlockerPinterestPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Pinterest blocker preset.
 */
class PinterestPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PinterestPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\PinterestPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-video'
                ],
                $parent['attributes']
            )
        ]);
    }
}
