<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GetYourGuidePreset as ProGetYourGuidePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * GetYourGuide cookie preset.
 */
class GetYourGuidePreset extends \DevOwl\RealCookieBanner\presets\pro\GetYourGuidePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'GetYourGuide allows us to show you attractions, tours and guided tours from the GetYourGuide catalog. For example, based on the context of the page or through search forms. Cookies are used to uniquely identify you across multiple subpages and websites. We try to uniquely identify you as a person, your current session and your device. In addition, it is stored via which website and which advertising partner you have found offers from GetYourGuide.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'GetYourGuide Deutschland GmbH',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.getyourguide.com/privacy_policy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'visitor_id',
                        'host' => '.getyourguide.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 5
                    ],
                    [
                        'type' => 'http',
                        'name' => '__ssid',
                        'host' => '.getyourguide.com',
                        'duration' => 4,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ab.storage.sessionId.*',
                        'host' => '.getyourguide.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ab.storage.deviceId.*',
                        'host' => '.getyourguide.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'partner_id',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'gyg_visitor_id',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'deleteTechnicalDefinitionsAfterOptOut' => \true
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
