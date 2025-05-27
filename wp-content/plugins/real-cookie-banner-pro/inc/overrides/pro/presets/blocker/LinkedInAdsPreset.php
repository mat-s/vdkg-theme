<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\LinkedInAdsPreset as PresetsLinkedInAdsPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\LinkedInAdsPreset as BlockerLinkedInAdsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * LinkedInAds blocker preset.
 */
class LinkedInAdsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\LinkedInAdsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\LinkedInAdsPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
