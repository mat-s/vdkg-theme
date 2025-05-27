<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GetYourGuidePreset as PresetsGetYourGuidePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GetYourGuidePreset as BlockerGetYourGuidePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * GetYourGuide blocker preset.
 */
class GetYourGuidePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GetYourGuidePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'We would like to show you attractions, tours and guides from GetYourGuide. But for that you have to allow us to use the GetYourGuide service.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GetYourGuidePreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'default',
                    'visualContentType' => 'generic'
                ],
                $parent['attributes']
            )
        ]);
    }
}
