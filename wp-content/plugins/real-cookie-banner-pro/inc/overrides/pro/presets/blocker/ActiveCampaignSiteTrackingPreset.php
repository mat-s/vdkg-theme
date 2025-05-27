<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\ActiveCampaignSiteTrackingPreset as PresetsActiveCampaignSiteTrackingPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\ActiveCampaignSiteTrackingPreset as BlockerActiveCampaignSiteTrackingPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Active Campaign Site Tracking blocker preset.
 */
class ActiveCampaignSiteTrackingPreset extends
    \DevOwl\RealCookieBanner\presets\pro\blocker\ActiveCampaignSiteTrackingPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\ActiveCampaignSiteTrackingPreset::IDENTIFIER
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
