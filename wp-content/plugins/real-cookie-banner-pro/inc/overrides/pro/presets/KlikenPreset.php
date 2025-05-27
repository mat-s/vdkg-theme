<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\KlikenPreset as ProKlikenPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Kliken cookie preset.
 */
class KlikenPreset extends \DevOwl\RealCookieBanner\presets\pro\KlikenPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $name = 'Kliken';
        return \array_merge($parent, [
            'attributes' => [
                'name' => $name,
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Kliken or also called Kliken Analytics is a service for creating detailed statistics about user behavior on the website. This detailed user profile may be forwarded to the Google Ads service in order to be able to optimally place ads on the Google Ads network for this website. Cookies are used to assign a unique identification number to the visitor and to be able to identify them again over several page requests and to be able to link the data of several page requests.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'SiteWit Corp. and d.b.a Kliken, Kliken GmbH',
                'providerPrivacyPolicyUrl' => 'https://www.kliken.com/privacy-policy.html',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'AWSALBCORS',
                        'host' => 'connect.sitewit.com',
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false,
                        'duration' => 7
                    ],
                    [
                        'type' => 'http',
                        'name' => 'AWSALBCORS',
                        'host' => 'analytics.sitewit.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_swa_u',
                        'host' => \DevOwl\RealCookieBanner\Utils::host(
                            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
                        ),
                        'duration' => 3,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => '_swa_u',
                        'host' => \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN),
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'ePrivacyUSA' => \true,
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
