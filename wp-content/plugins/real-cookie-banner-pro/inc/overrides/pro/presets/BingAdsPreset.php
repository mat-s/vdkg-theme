<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\BingAdsPreset as ProBingAdsPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Microsoft Advertising Universal Event Tracking (UET) Tag (Bing Ads) cookie preset.
 */
class BingAdsPreset extends \DevOwl\RealCookieBanner\presets\pro\BingAdsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        $cookieHostCurrent = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Microsoft Advertising Universal Event Tracking (UET) Tag tracks the conversion rate and success of Microsoft Advertising campaigns. Cookies are used to differentiate users and track their behavior on the site in detail, and to associate this data with advertising data from the "Microsoft Advertising" advertising network. This data may be linked to data about users who have signed in to their Microsoft accounts on microsoft.com or a localized version of Microsoft or services with Microsoft single-sign on.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Microsoft Corporation',
                'providerPrivacyPolicyUrl' => __(
                    'https://privacy.microsoft.com/en-us/privacystatement',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'MUID',
                        'host' => '.bing.com',
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 13
                    ],
                    [
                        'type' => 'http',
                        'name' => '_uetsid',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_uetvid',
                        'host' => $cookieHost,
                        'duration' => 16,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ClarityFlagLoaded_*',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_uetsid_exp',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_uetvid_exp',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_uetvid',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_uetsid',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ClarityFlagLoaded_*_exp',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'microsiftAdvertisingUetTagId',
                        'label' => __('Microsoft Advertising Universal Event Tracking (UET) Tag ID', RCB_TD),
                        'expression' => '^\\d+',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '376341751',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'On <a href="%s" target="_blank">ads.microsoft.com</a> under Tools > Conversion tracking > UET tag you can find the tag ID of your UET tag in the tag table.',
                                RCB_TD
                            ),
                            __('https://ads.microsoft.com', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' =>
                    '<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"{{microsiftAdvertisingUetTagId}}"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>',
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
                'tagManagerOptInEventName' => 'bing-ads-opt-in',
                'tagManagerOptOutEventName' => 'bing-ads-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'bing-ads-opt-in',
                'tagManagerOptOutEventName' => 'bing-ads-opt-out'
            ]
        ];
    }
}
