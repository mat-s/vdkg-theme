<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TaboolaPreset as ProTaboolaPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Taboola cookie preset.
 */
class TaboolaPreset extends \DevOwl\RealCookieBanner\presets\pro\TaboolaPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    "Taboola enables websites to display advertisements and non-promotional article recommendations from the Taboola advertising network on the website and to be paid for this. In the process, information collected from website visitors includes device and operating system information, IP addresses, pages viewed on the website, the link a website visitor used to reach the website, the date and time a website visitor accessed a website, event information (e.g. system crashes) and general location information (e.g. city and country). This data is used to customize content and advertising to the interests of website visitors and to create a cross-browser and cross-device profile of the website visitor. Taboola shares the information it collects with Taboola affiliated companies, Taboola's service providers, non-Taboola affiliated companies for advertising optimization, and website operators. Cookies are used to distinguish users by a unique ID and to track their behavior on the site in detail, to avoid displaying duplicate recommendations on the site, to remember whether the user performed an action in the \"Taboola Select\" feature, to remember which items recommended by a Taboola service were clicked on, to remember customization of recommendations to that specific user, to use the Taboola Newsroom service to optimize advertising delivery, e.g. by saving the referring website or measuring performance of clicked articles on the website and to technically enable an identification number to improve Taboola's browser-based services and Taboola's mobile SDK services.",
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Taboola, Inc.',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.taboola.com/policies/privacy-policy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'taboola_session_id',
                        'host' => 'trc.taboola.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'taboola_select',
                        'host' => 'taboola.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'taboola_fp_td_user_id',
                        'host' => 'taboola.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 't_gid',
                        'host' => 'taboola.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'trc_cookie_storage',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_tb_sess_r',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_tb_t_ppg',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'abLdr',
                        'host' => 'taboola.com',
                        'duration' => 3,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'tb_click_param',
                        'host' => $cookieHost,
                        'duration' => 50,
                        'durationUnit' => 's',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'taboola global:local-storage-keys',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'taboola global:user-id',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'trc_cache',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'trc_cache_by_placement',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'tbl-session-referrer',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'In the "Code executed on opt-in" field, paste the code for your Taboola Ads. Alternatively, if you manage your Taboola outside of Real Cookie Banner, use the content blocker below to block them until consent is obtained.',
                    RCB_TD
                ),
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
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
