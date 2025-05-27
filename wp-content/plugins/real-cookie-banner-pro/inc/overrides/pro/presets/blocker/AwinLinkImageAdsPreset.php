<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\AwinLinkImageAdsPreset as PresetsAwinLinkImageAdsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\AwinLinkImageAdsPreset as BlockerAwinLinkImageAdsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Awin (Link and image ads) blocker preset.
 */
class AwinLinkImageAdsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\AwinLinkImageAdsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\AwinLinkImageAdsPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
