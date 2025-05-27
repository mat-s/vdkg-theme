<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TwitterTweetPreset as ProTwitterTweetPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Twitter (tweet) cookie preset.
 */
class TwitterTweetPreset extends \DevOwl\RealCookieBanner\presets\pro\TwitterTweetPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'Twitter (embedded tweet)',
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Twitter allows embedding content posted on twitter.com directly into websites. The cookies are used to collect visited websites and detailed statistics about the user behaviour. This data can be linked to the data of users registered on twitter.com.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Twitter Inc.',
                'providerPrivacyPolicyUrl' => 'https://twitter.com/en/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_twitter_sess',
                        'host' => '.twitter.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'gt',
                        'host' => '.twitter.com',
                        'duration' => 3,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ct0',
                        'host' => '.twitter.com',
                        'duration' => 6,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'guest_id',
                        'host' => '.twitter.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'personalization_id',
                        'host' => '.twitter.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'twid',
                        'host' => '.twitter.com',
                        'duration' => 5,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'auth_token',
                        'host' => '.twitter.com',
                        'duration' => 5,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'remember_checked_on',
                        'host' => '.twitter.com',
                        'duration' => 5,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ads_prefs',
                        'host' => '.twitter.com',
                        'duration' => 5,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'dnt',
                        'host' => '.twitter.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'kdt',
                        'host' => '.twitter.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => '__widgetsettings',
                        'host' => 'platform.twitter.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'local_storage_support_test',
                        'host' => 'platform.twitter.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gat',
                        'host' => '.twitter.com',
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_ga',
                        'host' => '.twitter.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gid',
                        'host' => '.twitter.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'There is no need for an opt-in script because the Twitter content is usually loaded in an iframe. You must create a content blocker that will block Twitter until the user gives consent to load it.',
                    RCB_TD
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
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
