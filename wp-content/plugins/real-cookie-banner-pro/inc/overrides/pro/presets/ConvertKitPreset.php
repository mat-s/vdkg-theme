<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ConvertKitPreset as ProConvertKitPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * ConvertKit cookie preset.
 */
class ConvertKitPreset extends \DevOwl\RealCookieBanner\presets\pro\ConvertKitPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'ConvertKit is a marketing platform that allows us to differentiate audiences and send marketing messages via email. The service also plays contextual prompts to subscribe to newsletters. Cookies are used to assign a unique ID to each visitor to uniquely identify them across multiple subpages, to remember which newsletter subscription prompts have already been displayed, and to prevent attacks against the infrastructure of the service.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'ConvertKit LLC',
                'providerPrivacyPolicyUrl' => 'https://convertkit.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '__cf_bm',
                        'host' => '.convertkit.com',
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false,
                        'duration' => 30
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ckid',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ck/forms/modal/*/hideUntil',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
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
