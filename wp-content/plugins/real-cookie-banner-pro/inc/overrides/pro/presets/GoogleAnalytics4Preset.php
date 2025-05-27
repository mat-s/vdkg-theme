<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset;
use DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset;
use DevOwl\RealCookieBanner\presets\pro\GoogleAnalytics4Preset as ProGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Analytics (Analytics 4) cookie preset.
 */
class GoogleAnalytics4Preset extends \DevOwl\RealCookieBanner\presets\pro\GoogleAnalytics4Preset {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = [
        // Free plugins
        \DevOwl\RealCookieBanner\lite\presets\GAGoogleAnalyticsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalyticsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset::SLUG_FREE,
        \DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::SLUG_FREE,
        // Premium plugins
        \DevOwl\RealCookieBanner\lite\presets\GAGoogleAnalyticsPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\lite\presets\PerfmattersGAPreset::SLUG,
        \DevOwl\RealCookieBanner\presets\pro\MonsterInsightsPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\AnalytifyPreset::SLUG_PRO,
        \DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::SLUG_PRO_LEGACY,
        \DevOwl\RealCookieBanner\presets\pro\ExactMetricsPreset::SLUG_PRO
    ];
    const BLOCKER_PRESET_IDS = [
        self::IDENTIFIER,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GA_GOOGLE_ANALYTICS_4,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS_4,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PERFMATTERS_GA4,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANALYTIFY_4,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS_4,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS_4
    ];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'blockerPresetIds' => self::BLOCKER_PRESET_IDS,
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google Analytics is a service for creating detailed statistics of user behavior on the website. The cookies are used to differentiate users, store campaign related information for and from the user and to link data from multiple page views.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
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
                        'name' => '_ga_*',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'You can only use this template with a Google Analytics 4 property with a Google Analytics measure ID (avaible since from October 2020). If you have a Google Analytics tracking ID such as <code>GA-123456789-0</code>, please use the Google Analytics Universal Analytics template.',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'gaMeasurementId',
                        'label' => __('Google Analytics Measurement ID', RCB_TD),
                        'expression' => '^G-',
                        'invalidMessage' => __('Please fill in a valid tracking ID!', RCB_TD),
                        'example' => 'G-S11AA11F2X',
                        'hint' => \join(' ', [
                            \sprintf(
                                // translators:
                                __(
                                    'You can find your Measurement ID (also called property ID) in the <a href="%s" target="_blank">Analytics Dashboard</a> under Admin (gear icon) > Select your account > Select your property > Setup Assistant > Tag installation > Select your website.',
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
                    '<script async %1$s="%2$s" %3$s="%4$s" src="https://www.googletagmanager.com/gtag/js?id={{gaMeasurementId}}"></script>
<script %1$s="%2$s">
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag(\'js\', new Date());
gtag(\'config\', \'{{gaMeasurementId}}\', { anonymize_ip: true });
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
