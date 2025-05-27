<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset as ProRankMathGAPreset;
use DevOwl\RealCookieBanner\presets\pro\RankMathGA4Preset as ProRankMathGA4Preset;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * RankMath Google Analytics preset -> Google Analytics cookie preset.
 */
class RankMathGA4Preset extends \DevOwl\RealCookieBanner\presets\pro\RankMathGA4Preset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\GoogleAnalytics4Preset::IDENTIFIER,
                'shouldRemoveTechnicalHandlingWhenOneOf' => \DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset::needs(),
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'Please note that the "Anonymize IP addresses" feature, which is mandatory to be GDPR compliant, is only available in the paid version of Rank Math.',
                        RCB_TD
                    ),
                    __(
                        'We recommend that you disable the "Install analytics code" option in Rank Math and instead integrate Google Analytics via the "Google Analytics" template in Real Cookie Banner.',
                        RCB_TD
                    )
                ])
            ]
        ]);
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
