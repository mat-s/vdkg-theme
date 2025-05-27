<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AddThisPreset as ProAddThisPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * AddThis Share Buttons preset.
 */
class AddThisPreset extends \DevOwl\RealCookieBanner\presets\pro\AddThisPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'AddThis allows providing links and buttons for sharing content on a variety of social networks and other communication tools on the internet. Cookie are used to enable the core functionality of AddThis, to enable AddThis Publishers and Oracle Marketing & Data Cloud customers and partners to market products and services to you,  to provide personalized recommendations and messages,  to link browsers and apps across devices, to sync unique identifiers; and, to analyze, develop, and improve the AddThis Tools and Oracle products and services and to manage the security of our sites, networks, and systems.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Oracle Corporation, Oracle America, Inc.',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.oracle.com/legal/privacy/addthis-privacy-policy.html',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'loc',
                        'host' => '.addthis.com',
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 13
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uvc',
                        'host' => '.addthis.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__atuvs',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__atuvc',
                        'host' => $cookieHost,
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => '_at.cww',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'at-rand',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'at-lojson-cache-ra-5fd78bc7dbe6a1f2',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_at.hist.1214',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'Please note that you should disable the "Share Counters" feature in your AddThis dashboard. This feature includes scripts of the embedded services (e.g. Facebook, Twitter, Pinterest) and transfers data without consent.',
                    RCB_TD
                ),
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
