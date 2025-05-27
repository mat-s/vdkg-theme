<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\GoogleRecaptchaPreset as ProGoogleRecaptchaPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google reCAPTCHA cookie preset.
 */
class GoogleRecaptchaPreset extends \DevOwl\RealCookieBanner\presets\pro\GoogleRecaptchaPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'blockerPresetIds' => [
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CALDERA_FORMS_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CONTACT_FORM_7_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FORM_MAKER_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FORMIDABLE_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::NINJA_FORMS_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WPFORMS_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CLEVERREACH_RECAPTCHA,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ELEMENTOR_FORMS_RECAPTCHA
            ],
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google reCAPTCHA is a solution for detecting bots, e. g. when entering data into online forms, and preventing spam. The cookies are used to identify the user as a user within the data known to Google and to estimate the malignancy of the user. This collected data may be linked to data about users who have signed in to their Google accounts on google.com or a localised version of Google.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'NID',
                        'host' => '.google.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rc::a',
                        'host' => 'www.google.com',
                        'duration' => 1,
                        'durationUnit' => 's',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rc::b',
                        'host' => 'www.google.com',
                        'duration' => 1,
                        'durationUnit' => 's',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rc::c',
                        'host' => 'www.google.com',
                        'duration' => 1,
                        'durationUnit' => 's',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SIDCC',
                        'host' => '.google.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__Secure-3PAPISID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SSID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SAPISID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'APISID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'HSID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__Secure-3PSID',
                        'host' => '.google.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SEARCH_SAMESITE',
                        'host' => '.google.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
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
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'Please make sure that e. g. your contact form does not load Google reCAPTCHA before approval. In many cases, but not all, you can create a content blocker for this purpose (templates for common contact form WordPress plugins are available).',
                    RCB_TD
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
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
