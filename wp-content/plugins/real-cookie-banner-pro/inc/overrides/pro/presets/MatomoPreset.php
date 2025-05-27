<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\CookiePresets;
use DevOwl\RealCookieBanner\presets\pro\MatomoPreset as ProMatomoPreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Matomo cookie preset.
 */
class MatomoPreset extends \DevOwl\RealCookieBanner\presets\pro\MatomoPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Matomo is a service to create detailed statistics about the user behavior on the website. Cookies are used to differentiate users and to link data from multiple page views.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => get_bloginfo('name'),
                'providerPrivacyPolicyUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getPrivacyPolicyUrl(
                    ''
                ),
                'providerLegalNoticeUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getImprintPageUrl(
                    ''
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_pk_id.*',
                        'host' => $cookieHost,
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pk_ref.*',
                        'host' => $cookieHost,
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pk_ses.*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pk_cvar.*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pk_hsr.*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pk_testcookie.*',
                        'host' => $cookieHost,
                        'duration' => 0,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \true
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mtm_consent',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => $this->getMatomoPluginNotice(),
                'dynamicFields' => [
                    [
                        'name' => 'mtHost',
                        'label' => __('Matomo Host', RCB_TD),
                        'expression' =>
                            '^\\.?(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9])\\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9-]*[A-Za-z0-9])(\\/[^#\\?]*)?$',
                        'invalidMessage' => __('Please provide a valid host!', RCB_TD),
                        'example' => 'matomo.example.com'
                    ],
                    [
                        'name' => 'mtSiteId',
                        'label' => __('Matomo Site ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '1'
                    ]
                ],
                'codeOptIn' => '<script>
    var _paq = window._paq || [];
    _paq.push(["trackPageView"]);
    _paq.push(["enableLinkTracking"]);
    (function () {
        var u = "https://{{mtHost}}/";
        _paq.push(["setTrackerUrl", u + "matomo.php"]);
        _paq.push(["setSiteId", "{{mtSiteId}}"]);
        var d = document,
            g = d.createElement("script"),
            s = d.getElementsByTagName("script")[0];
        g.type = "text/javascript";
        g.async = true;
        g.defer = true;
        g.src = "//{{mtHost}}/matomo.js";
        s.parentNode.insertBefore(g, s);
    })();
</script>
<noscript>
    <p><img src="https://{{mtHost}}/matomo.php?idsite={{mtSiteId}}&amp;rec=1" style="border: 0;" alt="" /></p>
</noscript>',
                'codeOptOut' => '<script>
    var _paq = window._paq;
    if (_paq) {
        _paq.push(["disableCookies"]);
    }
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
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'ma-opt-in',
                'tagManagerOptOutEventName' => 'ma-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'ma-opt-in',
                'tagManagerOptOutEventName' => 'ma-opt-out'
            ]
        ];
    }
    /**
     * Get a notice if the official WordPress matomo plugin is active.
     */
    protected function getMatomoPluginNotice() {
        $isActive = \DevOwl\RealCookieBanner\Utils::isPluginActive(
            \DevOwl\RealCookieBanner\lite\presets\MatomoPluginPreset::SLUG
        );
        if (!$isActive) {
            return '';
        }
        return \sprintf(
            '<br /><br />%s',
            \sprintf(
                // translators:
                __(
                    'You have installed the official Matomo WordPress plugin, which installs Matomo directly into your WordPress. <strong>This template is only suitable for externally hosted Matomo instances.</strong> Use the <a href="%s" target="_blank">Matomo (WordPress Plugin)</a> cookie template to use Matomo correctly via the Matomo WordPress plugin.',
                    RCB_TD
                ),
                \DevOwl\RealCookieBanner\presets\CookiePresets::getCreateUrl(
                    \DevOwl\RealCookieBanner\lite\presets\MatomoPluginPreset::IDENTIFIER
                )
            )
        );
    }
}
