<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\IssuuPreset as ProIssuuPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Issuu cookie preset.
 */
class IssuuPreset extends \DevOwl\RealCookieBanner\presets\pro\IssuuPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Issuu allows embedding content posted on issuu.com directly into websites. The cookies are used to collect visited websites and detailed statistics about the user behaviour. This data can be linked to the data of users registered on issuu.com.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Issuu, Inc.',
                'providerPrivacyPolicyUrl' => 'https://issuu.com/legal/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'mc',
                        'host' => '.quantserve.com',
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 25
                    ],
                    [
                        'type' => 'http',
                        'name' => 'd',
                        'host' => '.quantserve.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'iutk',
                        'host' => '.issuu.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ]
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
