<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GoogleAdSensePreset as ProGoogleAdSensePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google AdSense cookie preset.
 */
class GoogleAdSensePreset extends \DevOwl\RealCookieBanner\presets\pro\GoogleAdSensePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        $cookieHostWithSubdomains = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google AdSense allows websites to place ads from the Google Ads advertising network on their website and be paid for it. Cookies are used to distinguish users and track their behavior on the website in detail and to associate this data with advertising data from the Google Ads advertising network. The data will be evaluated for the targeted placement of ads and to measure the success of the advertising. This data may be linked to data about users who have signed in to their Google accounts on google.com or a localised version of Google.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'goog_pem_mod',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'google_experiment_mod*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '__gads',
                        'host' => $cookieHostWithSubdomains,
                        'duration' => 9,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'NID',
                        'host' => '.google.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ANID',
                        'host' => '.google.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '1P_JAR',
                        'host' => '.google.com',
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'GOOGLE_ABUSE_EXEMPTION',
                        'host' => '.google.com',
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'CONSENT',
                        'host' => '.google.com',
                        'duration' => 18,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'IDE',
                        'host' => '.doubleclick.net',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'test_cookie',
                        'host' => '.doubleclick.net',
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'DSID',
                        'host' => '.doubleclick.net',
                        'duration' => 14,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SIDCC',
                        'host' => '.google.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SEARCH_SAMESITE',
                        'host' => '.google.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__Secure-3PAPISID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SSID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SAPISID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'APISID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'HSID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__Secure-3PSID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'googleAdsensePublisherId',
                        'label' => __('Google Adsense Publisher ID', RCB_TD),
                        'expression' => '^pub-\\d{10,30}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => 'pub-8259337342422183',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You have to enter your Google Adsense Publisher ID, so that e.g. Auto Ads (if activated in your Adsense account) can be displayed. You can find it in the <a href="%s" target="_blank">Google Adsense Dashboard</a> under <i>Account > Settings > Account information</i>.',
                                RCB_TD
                            ),
                            __('https://www.google.com/adsense', RCB_TD)
                        )
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'To place ads manually, please create your ad HTML codes in Google AdSense under <i>Menu > Ads > Overview > By ad unit</i>. You do NOT need to include the &lt;script> tags of the generated ad unit, but only the &lt;ins> tags in the position where you want the ad to appear, so that the ads work after the consent of the user.',
                    RCB_TD
                ),
                'codeOptIn' => '<script data-ad-client="ca-{{googleAdsensePublisherId}}" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (function(ads) {
        for (var i = 0; i < ads.length; i++) {
            (adsbygoogle = window.adsbygoogle || []).push({});
        }
    })([].slice.call(document.querySelectorAll("ins.adsbygoogle")).filter(function(node) {
        return node.childNodes.length === 0;
    }));
</script>',
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
                'tagManagerOptInEventName' => 'adsense-opt-in',
                'tagManagerOptOutEventName' => 'adsense-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'adsense-opt-in',
                'tagManagerOptOutEventName' => 'adsense-opt-out'
            ]
        ];
    }
}
