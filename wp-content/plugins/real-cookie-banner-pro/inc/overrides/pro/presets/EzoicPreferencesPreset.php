<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EzoicPreferencesPreset as ProEzoicPreferencesPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Ezoic (Preferences) preset.
 */
class EzoicPreferencesPreset extends \DevOwl\RealCookieBanner\presets\pro\EzoicPreferencesPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Ezoic is a platform for optimized display of advertising and performance-optimized serving of websites. Cookies are used to remember the played out layout of the website for the user. For example, when using A/B testing, this remembers positions of elements including ad positioning and the layout of the website. This ensures a consistent visual appearance of the website, otherwise an alternative layout might be displayed for each page view, which would affect the quality of the user experience.',
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
                        'name' => 'active_template::*',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezds',
                        'host' => $cookieHost,
                        'duration' => 7,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ezohw',
                        'host' => $cookieHost,
                        'duration' => 7,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'codeOptIn' =>
                    "<script>\nif (typeof ezConsentCategories == 'object' && typeof __ezconsent == 'object') {\n    window.ezConsentCategories.preferences = true;\n}\n</script>",
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
