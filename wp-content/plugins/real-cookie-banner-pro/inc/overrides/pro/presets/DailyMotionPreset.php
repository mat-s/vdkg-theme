<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\DailyMotionPreset as ProDailyMotionPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Dailymotion cookie preset.
 */
class DailyMotionPreset extends \DevOwl\RealCookieBanner\presets\pro\DailyMotionPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Dailymotion allows embedding content posted on dailymotion.com directly into websites. The cookies are used to collect visited websites and detailed statistics about the user behavior. This data can be linked to the data of users registered on dailymotion.com. In addition, personalized and non-personalized advertising can be played before, in or after the actual content.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Dailymotion SA',
                'providerPrivacyPolicyUrl' => 'https://www.dailymotion.com/legal/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'client_token',
                        'host' => 'www.dailymotion.com',
                        'duration' => 8,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'v1st',
                        'host' => '.dailymotion.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'UID',
                        'host' => '.scorecardresearch.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'usprivacy',
                        'host' => '.dailymotion.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'dmvk',
                        'host' => '.dailymotion.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ts',
                        'host' => '.dailymotion.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'stlast',
                        'host' => 'www.dailymotion.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'dmp_currenttime',
                        'host' => 'www.dailymotion.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'STORE_VISIT',
                        'host' => 'www.dailymotion.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'inlined_view_id',
                        'host' => 'www.dailymotion.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'damd',
                        'host' => '.dailymotion.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'dm-euconsent-v2',
                        'host' => '.dailymotion.com',
                        'duration' => 8,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
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
