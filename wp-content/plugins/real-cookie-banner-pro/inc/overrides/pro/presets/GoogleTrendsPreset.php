<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GoogleTrendsPreset as ProGoogleTrendsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Trends cookie preset.
 */
class GoogleTrendsPreset extends \DevOwl\RealCookieBanner\presets\pro\GoogleTrendsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google Trends allows embedding aggregated search data and trends directly into websites. The cookies are used to collect visited websites and detailed statistics about the user behavior. This data can be linked to the data of users registered on google.com or localized versions of these services.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'NID',
                        'host' => '.google.com',
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 6
                    ]
                ],
                'ePrivacyUSA' => \true
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
