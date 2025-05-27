<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\pro\MetricoolPreset as ProMetricoolPreset;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Metricool cookie preset.
 */
class MetricoolPreset extends \DevOwl\RealCookieBanner\presets\pro\MetricoolPreset {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = [self::SLUG];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Metricool helps us better understand from which traffic sources visitors found content on our website. No cookies in the technical sense are used. However, in addition to the IP address, data about the page view such as URL of the page viewed, referrer or browser size are transmitted via a tracking pixel.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Metricool Software SL',
                'providerPrivacyPolicyUrl' => 'https://metricool.com/legal-terms/',
                'isEmbeddingOnlyExternalResources' => \true,
                'codeOptIn' => \sprintf(
                    '<script %1$s="%2$s">function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"{{metricoolHash}}"})});</script>',
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_SKIP_IF_ACTIVE,
                    \join(',', self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS)
                ),
                'dynamicFields' => [
                    [
                        'name' => 'metricoolHash',
                        'label' => __('Metricool Hash', RCB_TD),
                        'expression' => '^[a-f0-9]{32}$',
                        'invalidMessage' => __('Please provide a valid hash!', RCB_TD),
                        'example' => '0b2d3e8187cbf2b8e5829a9358c140b4',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You find your Metricool hash in the <a href="%s" target="_blank">Metricool Brand Conncetions</a>, if you use "Connect web" and choose the integration as JavaScript tag, within the generated JavaScript.',
                                RCB_TD
                            ),
                            __('https://app.metricool.com/brands/connections', RCB_TD)
                        )
                    ]
                ],
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
                'tagManagerOptInEventName' => 'metricool-opt-in',
                'tagManagerOptOutEventName' => 'metricool-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'metricool-opt-in',
                'tagManagerOptOutEventName' => 'metricool-opt-out'
            ]
        ];
    }
}
