<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FacebookGraphPreset as ProFacebookGraphPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Graph cookie preset.
 */
class FacebookGraphPreset extends \DevOwl\RealCookieBanner\presets\pro\FacebookGraphPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Facebook Graph allows us to load data such as names, images or texts from the so-called Facebook Social Graph (database). The cookies are used to collect visited websites and detailed statistics about user behavior. This data can be linked to the data of users registered on facebook.com.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Meta Platforms Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://www.facebook.com/policy.php',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'presence',
                        'host' => '.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'fr',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'xs',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'c_user',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'dpr',
                        'host' => '.facebook.com',
                        'duration' => 7,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'datr',
                        'host' => '.facebook.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'wd',
                        'host' => '.facebook.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sb',
                        'host' => '.facebook.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
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
