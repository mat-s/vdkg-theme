<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TikTokPixelPreset as ProTikTokPixelPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * TikTok Pixel preset.
 */
class TikTokPixelPreset extends \DevOwl\RealCookieBanner\presets\pro\TikTokPixelPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'TikTok Pixel helps to determine whether you are the target audience for presenting ads within the TikTok advertising network. The TikTok Pixel also allows to track the effectiveness of TikTok Ads. Cookies are used to differentiate users and to record their behavior on the website in detail, and to link this data with advertising data from the TikTok advertising network. This data can be linked to the data of users registered on tiktokok.com or the app of the service with their TikTok accounts or data from the contact book of the user and friends of the user or with data from third-party providers that are likely to be associated with your person.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' =>
                    'TikTok Technology Limited, TikTok Ireland and TikTok Information Technologies UK Limited',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.tiktok.com/legal/privacy-policy?lang=en#privacy-eea',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'tt_sessionId',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'tt_appInfo',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'odin_tt',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'd_ticket',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ttwid',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'tt_csrf_token',
                        'host' => '.tiktok.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'store-idc',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sid_ucp_v1',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sessionid_ss',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sid_tt',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uid_tt_ss',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'cmpl_token',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'store-country-code',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'passport_csrf_token_default',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uid_tt',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sid_guard',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'passport_auth_status',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'passport_csrf_token',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'cookie-consent',
                        'host' => '.tiktok.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'msToken',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'tt_webid_v2',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'passport_auth_status_ss',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sessionid',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'tt_webid',
                        'host' => '.tiktok.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ssid_ucp_v1',
                        'host' => '.tiktok.com',
                        'duration' => 2,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '*',
                        'host' => '.tiktok.com',
                        'duration' => 10,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'tikTokPixelId',
                        'label' => __('TikTok Pixel ID', RCB_TD),
                        'expression' => '^[A-Z0-9]+$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => 'C4RHG89PBM656MIL6J11',
                        'hint' => \join('<br /><br />', [
                            \sprintf(
                                // translators:
                                __(
                                    'In the <a href="%s" target="_blank">Event Manager of the TikTok Ad Manager</a> you can create a website pixel. Select "Manually install pixel code" for the type of integration. Whether you want to use the "Standard Mode" or "Developer Mode" depends on your purpose.',
                                    RCB_TD
                                ),
                                __('https://ads.tiktok.com/i18n/events_manager/', RCB_TD)
                            ),
                            \sprintf(
                                // translators:
                                __(
                                    'After creating the TikTok Pixel you return to the <a href="%s" target="_blank">Event Manager of the TikTok Ad Manager</a> and select "Manage" in the section "Website Pixel". You will then see an overview of all the TikTok pixels you have created. Each TikTok pixel has its ID directly under its name.',
                                    RCB_TD
                                ),
                                __('https://ads.tiktok.com/i18n/events_manager/', RCB_TD)
                            )
                        ])
                    ]
                ],
                'codeOptIn' => '<script>
!function (w, d, t) {
    w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
        
    ttq.load(\'{{tikTokPixelId}}\');
    ttq.page();
}(window, document, \'ttq\');
</script>',
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
