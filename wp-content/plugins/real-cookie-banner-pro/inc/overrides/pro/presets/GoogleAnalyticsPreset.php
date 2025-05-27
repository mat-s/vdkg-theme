<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset;
use DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset;
use DevOwl\RealCookieBanner\presets\pro\GAGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\pro\GoogleAnalyticsPreset as ProGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset;
use DevOwl\RealCookieBanner\presets\pro\PerfmattersGAPreset;
use DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset;
use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Analytics cookie preset.
 */
class GoogleAnalyticsPreset extends \DevOwl\RealCookieBanner\presets\pro\GoogleAnalyticsPreset {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = [
        // Free plugins
        \DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\GAGoogleAnalyticsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset::SLUG_FREE,
        // Premium plugins
        \DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\GAGoogleAnalyticsPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::SLUG_PRO_LEGACY,
        \DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\PerfmattersGAPreset::SLUG,
        \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset::SLUG
    ];
    const BLOCKER_PRESET_IDS = [
        self::IDENTIFIER,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GA_GOOGLE_ANALYTICS,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANALYTIFY,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PERFMATTERS_GA,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS_PRO
    ];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        $deprecated = __('Deprecated', RCB_TD);
        $deprecatedNotice = __(
            'This cookie works if you have a Google Analytics Universal Analytics property. This property must been created on Google Analytics before October 14, 2020. All Google Analytics properties created after that date are normal Google Analytics 4 properties.',
            RCB_TD
        );
        return \array_merge($parent, [
            'blockerPresetIds' => self::BLOCKER_PRESET_IDS,
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google Analytics is a service for creating detailed statistics of user behavior on the website. The cookies are used to differentiate users, throttle the request rate, link the client ID to the AMP client ID of the user, store campaign related information for and from the user and to link data from multiple page views.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'uniqueName' => 'google-analytics-ua',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_ga',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gid',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gat',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'AMP_TOKEN',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gac_*',
                        'host' => $cookieHost,
                        'duration' => 90,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gat_gtag_*',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \sprintf('<strong>%s</strong>: %s', $deprecated, $deprecatedNotice),
                'dynamicFields' => [
                    [
                        'name' => 'gaTrackingId',
                        'label' => __('Google Analytics Tracking ID', RCB_TD),
                        'expression' => '^UA-\\d{5,}-\\d+$',
                        'invalidMessage' => __('Please fill in a valid tracking ID!', RCB_TD),
                        'example' => 'UA-123456789-0',
                        'hint' => \join(' ', [
                            \sprintf(
                                // translators:
                                __(
                                    'You can find your Tracking ID (also called Property ID) in the <a href="%s" target="_blank">Analytics Dashboard</a> under Admin (gear icon) > Select your account > Select your property > Tracking Info > Tracking Code.',
                                    RCB_TD
                                ),
                                __('https://analytics.google.com/analytics/web/', RCB_TD)
                            ),
                            \sprintf(
                                '<a href="%s" target="_blank">%s</a>',
                                esc_attr(
                                    __(
                                        'https://devowl.io/2021/embed-google-analytics-website/#what-is-the-google-analytics-tracking-id-and-what-is-it-good-for',
                                        RCB_TD
                                    )
                                ),
                                __('Learn more about the Google Tracking ID.', RCB_TD)
                            )
                        ])
                    ]
                ],
                'codeOptIn' => \sprintf(
                    '<script async %1$s="%2$s" %3$s="%4$s" src="https://www.googletagmanager.com/gtag/js?id={{gaTrackingId}}"></script>
<script %1$s="%2$s">
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("config", "{{gaTrackingId}}", { anonymize_ip: true });
</script>',
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_SKIP_IF_ACTIVE,
                    \join(',', self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS),
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_UNIQUE_WRITE_NAME,
                    \DevOwl\RealCookieBanner\lite\presets\GoogleAds::UNIQUE_WRITE_GTAG
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'shouldUncheckContentBlockerCheckboxWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS
                )
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
                'tagManagerOptInEventName' => 'ga-opt-in',
                'tagManagerOptOutEventName' => 'ga-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'ga-opt-in',
                'tagManagerOptOutEventName' => 'ga-opt-out'
            ]
        ];
    }
}
