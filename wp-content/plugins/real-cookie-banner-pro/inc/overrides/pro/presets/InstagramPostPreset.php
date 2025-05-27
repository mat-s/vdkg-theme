<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\InstagramPostPreset as ProInstagramPostPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Instagram (Post) cookie preset.
 */
class InstagramPostPreset extends \DevOwl\RealCookieBanner\presets\pro\InstagramPostPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'Instagram (embedded post)',
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Instagram allows embedding content posted on instagram.com directly into websites. The cookies are used to collect visited websites and detailed statistics about the user behaviour. This data can be linked to the data of users registered on instagram.com and facebook.com.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Meta Platforms Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://help.instagram.com/519522125107875',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'rur',
                        'host' => '.instagram.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'shbid',
                        'host' => '.instagram.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'shbts',
                        'host' => '.instagram.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sessionid',
                        'host' => '.instagram.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mid',
                        'host' => '.instagram.com',
                        'duration' => 10,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ds_user_id',
                        'host' => '.instagram.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ig_did',
                        'host' => '.instagram.com',
                        'duration' => 10,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'csrftoken',
                        'host' => '.instagram.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'urlgen',
                        'host' => '.instagram.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ig_cb',
                        'host' => 'www.instagram.com',
                        'duration' => 100,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'pigeon_state',
                        'host' => 'www.instagram.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'pigeon_state',
                        'host' => 'www.instagram.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'There is no need for an opt-in script, because the Instagram content is normally loaded by a code in a post or page. You must create a content blocker that will block Instagram until the user gives consent to load it.',
                        RCB_TD
                    ),
                    \sprintf(
                        // translators:
                        __(
                            'What do you have to consider when integrating %1$s into your website? <a href="%2$s" target="_blank">Learn more about it in our blog!</a>',
                            RCB_TD
                        ),
                        $parent['name'],
                        esc_attr(__('https://devowl.io/2022/instagram-website-gdpr/', RCB_TD))
                    )
                ]),
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
