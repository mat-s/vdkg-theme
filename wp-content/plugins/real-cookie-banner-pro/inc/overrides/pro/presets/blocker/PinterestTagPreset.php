<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\PinterestTagPreset as PresetsPinterestTagPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\PinterestTagPreset as BlockerPinterestTagPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Pinterest Tag blocker preset.
 */
class PinterestTagPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\PinterestTagPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\PinterestTagPreset::IDENTIFIER]
                ],
                $parent['attributes']
            )
        ]);
    }
}
