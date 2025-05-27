<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\CleanTalkSpamProtectPreset as ProCleanTalkSpamProtectPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Cleantalk Spam Protect preset.
 */
class CleanTalkSpamProtectPreset extends \DevOwl\RealCookieBanner\presets\pro\CleanTalkSpamProtectPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'CleanTalk Spam protection, AntiSpam and Firewall',
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'CleanTalk is supposed to prevent access by attackers through a firewall and filters input in forms, e.g. comments, to prevent spam. Cookies are used to test whether cookies may be set, to collect information about the behavior of the visitor, e.g. from which website he was referred, number of page views, time of the first visit or time of the last visit, information about the device used by the user, e.g. whether JavaScript is allowed in the browser or the time zone of the user, and to assign a unique user ID to be able to recognize him in the firewall.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'CleanTalk Inc.',
                'providerPrivacyPolicyUrl' => 'https://cleantalk.org/publicoffer#privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'apbct_cookies_test',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'apbct_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ct_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ct_sfw_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ct_sfw_pass_key',
                        'host' => $cookieHost,
                        'duration' => 2,
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
