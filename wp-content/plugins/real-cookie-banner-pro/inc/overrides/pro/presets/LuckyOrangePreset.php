<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\LuckyOrangePreset as ProLuckyOrangePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Lucky Orange preset.
 */
class LuckyOrangePreset extends \DevOwl\RealCookieBanner\presets\pro\LuckyOrangePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        $cookieHostMainWithSubdomains = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Lucky Orange is a service for behavior analysis, collecting user feedback, showing polls and a chat. It creates heat maps and session records of user\'s behavior on the website and plays out polls based on the user interaction. The cookies are used to identify the user across multiple sub-pages, check if the user is banned from tracking, to store the total number of visits, to store the landing page and referrer of the user interaction, flag the user behavior to assign it to predefined funnels and collect the idle time of user interactions.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Lucky Orange LLC',
                'providerPrivacyPolicyUrl' => 'https://www.luckyorange.com/privacy.php',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_global_lucky_opt_out',
                        'host' => $cookieHostMainWithSubdomains,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 10
                    ],
                    [
                        'type' => 'http',
                        'name' => '_lo_np_*',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 30,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_lo_bn',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 30,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_lo_cid',
                        'host' => $cookieHostMainWithSubdomains,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_lo_uid',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_lo_v',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__lotl',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 180,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__lotr',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 180,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_lorid',
                        'host' => $cookieHostMainWithSubdomains,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'lo_idleTime',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'lo::behaviorTags',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'lo_session',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'To use Lucky Orange in accordance with the GDPR, you need to enable Extreme Privacy Mode in its web interface under Settings (gear) > Privacy > Enable Extreme Privacy Mode. This way IP addresses will be shortened.',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'luckyOrangeSiteId',
                        'label' => __('Lucky Orange Site ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '262828',
                        'hint' => __(
                            'You find your Lucky Orange Site ID in the home tab of Lucky Orange (overview of all sites).',
                            RCB_TD
                        )
                    ]
                ],
                'codeOptIn' =>
                    "<script>\nwindow.__lo_site_id = {{luckyOrangeSiteId}};\n\n(function() {\n    var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;\n    wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';\n    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);\n})();\n</script>",
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
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
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'lucky-orange-opt-in',
                'tagManagerOptOutEventName' => 'lucky-orange-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'lucky-orange-opt-in',
                'tagManagerOptOutEventName' => 'lucky-orange-opt-out'
            ]
        ];
    }
}
