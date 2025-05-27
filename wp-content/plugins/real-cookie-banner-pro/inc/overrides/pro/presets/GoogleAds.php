<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\GoogleAds as ProGoogleAds;
use DevOwl\RealCookieBanner\presets\pro\KlikenPreset;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Ads cookie preset.
 */
class GoogleAds extends \DevOwl\RealCookieBanner\presets\pro\GoogleAds {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = [\DevOwl\RealCookieBanner\presets\pro\KlikenPreset::SLUG];
    const BLOCKER_PRESET_IDS = [self::IDENTIFIER, \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLIKEN];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'blockerPresetIds' => self::BLOCKER_PRESET_IDS,
            'attributes' => [
                'name' => 'Google Ads',
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google Ads Conversation Tracking tracks the conversion rate and success of Google Ads campaigns. Cookies are used to differentiate users and track their behavior on the site in detail, and to associate this data with advertising data from the Google Ads advertising network. In addition, the data is used for so-called "remarketing" to display targeted advertising again to users who have already clicked on one of our advertisements within the Google Ads network. This data may be linked to data about users who have signed in to their Google accounts on google.com or a localized version of Google.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'test_cookie',
                        'host' => '.doubleclick.net',
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false,
                        'duration' => 1
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
                        'name' => 'CONSENT',
                        'host' => '.google.com',
                        'duration' => 18,
                        'durationUnit' => 'y',
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
                        'name' => '_gcl_au',
                        'host' => $cookieHost,
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'gAdsId',
                        'label' => __('Google Ads Conversation Tracking ID', RCB_TD),
                        'expression' => '^AW-\\d{7,12}$',
                        'invalidMessage' => __('Please fill in a valid tracking ID!', RCB_TD),
                        'example' => 'AW-123456789',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can find your Adwords ID in <a href="%s" target="_blank">Google Ads</a> at Tools > Measurement > Conversions > Click on the name of the conversation action > Tag setup > Install the tag yourself > Adwords ID in the code (e.g. AW-123456789).',
                                RCB_TD
                            ),
                            __('https://ads.google.com/aw/overview', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' => \sprintf(
                    '<script async %1$s="%2$s" %3$s="%4$s" src="https://www.googletagmanager.com/gtag/js?id={{gAdsId}}"></script>
<script %1$s="%2$s">
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "{{gAdsId}}");
</script>',
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_SKIP_IF_ACTIVE,
                    \join(',', self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS),
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_UNIQUE_WRITE_NAME,
                    self::UNIQUE_WRITE_GTAG
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
                'ePrivacyUSA' => \true
            ]
        ]);
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return [];
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'gads-opt-in',
                'tagManagerOptOutEventName' => 'gads-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'gads-opt-in',
                'tagManagerOptOutEventName' => 'gads-opt-out'
            ]
        ];
    }
}
