<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\BingMapsPreset as ProBingMapsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Bing Maps preset.
 */
class BingMapsPreset extends \DevOwl\RealCookieBanner\presets\pro\BingMapsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Bing Maps displays maps on the website as iframe or via JavaScript directly embedded as part of the website. Cookies are used to temporarily store the current state of the map. In addition, an advertising ID is assigned with which the client can be identified. It will collect visited websites and detailed statistics about the user behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Microsoft Corporation',
                'providerPrivacyPolicyUrl' => __(
                    'https://privacy.microsoft.com/en-us/privacystatement',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_SS',
                        'host' => '.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SRCHUID',
                        'host' => '.bing.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'MUID',
                        'host' => '.bing.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SRCHUSR',
                        'host' => '.bing.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SRCHD',
                        'host' => '.bing.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'zoom',
                        'host' => 'www.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'centerLongitude',
                        'host' => 'www.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_$Maps_centerLongitude_expiration',
                        'host' => 'www.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'centerLatitude',
                        'host' => 'www.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_$Maps_zoom_expiration',
                        'host' => 'www.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_$Maps_centerLatitude_expiration',
                        'host' => 'www.bing.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
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
