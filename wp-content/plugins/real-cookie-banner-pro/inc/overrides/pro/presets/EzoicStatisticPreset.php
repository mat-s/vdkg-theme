<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EzoicStatisticPreset as ProEzoicStatisticPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Ezoic (Statistics) preset.
 */
class EzoicStatisticPreset extends \DevOwl\RealCookieBanner\presets\pro\EzoicStatisticPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Ezoic is a platform for optimized display of advertising and performance-optimized serving of websites. Ezoic records the visitor\'s behavior on the website in detail in order to operate machine learning based services to optimize possibly displayed ads and to provide website operators with insights into the behavior of their visitors. Cookies are used to distinguish users, link data from multiple page views, and associate the data with ads that may be played. Cookies are also used to track screen and browser window size, to test new features and functionality on a select group of users, to assign users to an age and gender category, to count the number of sub-pages of this website you have visited, to remember from which website you visited this website (referrer), to personalize features and functionality for you on the website, to be able to uniquely identify you on this website across multiple websites on the internet, to record the duration of your visit to the website, to determine whether you engage with the content of the website and how intensively, to remember the time you spent on the last sub-page of your website, to remember the time you spent on the current sub-page of your website, and to identify fraudulent activities.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Ezoic Inc.',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.ezoic.com/privacy-policy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'ezoab_*',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezoadgid_*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezopvc_*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezoref_*',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezostid_*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezosuigeneris',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezouid_*',
                        'host' => $cookieHost,
                        'duration' => 720,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezovid_*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezux_et_*',
                        'host' => $cookieHost,
                        'duration' => 15,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezux_ifep_*',
                        'host' => $cookieHost,
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezux_lpl_*',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezux_tos_*',
                        'host' => $cookieHost,
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezoawesome_*',
                        'host' => $cookieHost,
                        'duration' => 720,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'If you use Google Analytics to provide Ezoic with more data about your visitors, you need to create a separate service for Google Analytics.',
                    RCB_TD
                ),
                'codeOptIn' =>
                    "<script>\nif (typeof ezConsentCategories == 'object' && typeof __ezconsent == 'object') {\n    window.ezConsentCategories.statistics = true;\n}\n</script>",
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
