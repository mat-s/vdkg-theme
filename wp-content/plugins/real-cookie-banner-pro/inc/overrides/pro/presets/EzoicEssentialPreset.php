<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EzoicEssentialPreset as ProEzoicEssentialPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Ezoic (Essential) preset.
 */
class EzoicEssentialPreset extends \DevOwl\RealCookieBanner\presets\pro\EzoicEssentialPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Ezoic is a platform for optimized display of advertising and performance-optimized website serving. Your IP address is processed by Ezoic and cookies are set to identify the correct configuration of the service, which is necessary for a consistent delivery of the website. Cookies are also used to differentiate you as a visitor of the website from other visitors.',
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
                        'name' => 'ezovuuid_*',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezovuuidtime_*',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'Depending on how you have configured Ezoic, additional cookies may be set. Please contact Ezoic support for more information!',
                        RCB_TD
                    ),
                    __(
                        'If you use Cloudflare together with Ezoic, you have to create Cloudflare as a separate service.',
                        RCB_TD
                    )
                ]),
                'codeOnPageLoad' =>
                    "<script>\ndocument.addEventListener('RCB/OptIn/All', function() {\n    if (typeof ezConsentCategories == 'object' && typeof __ezconsent == 'object') {\n        __ezconsent.setEzoicConsentSettings(window.ezConsentCategories);\n    }\n});\n</script>",
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
