<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\PinterestPreset as ProPinterestPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Pinterest cookie preset.
 */
class PinterestPreset extends \DevOwl\RealCookieBanner\presets\pro\PinterestPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Pinterest allows embedding content posted on pinterest.com directly into websites. The cookies are used to collect visited websites and detailed statistics about the user behavior. This data can be linked to the data of users registered on pinterest.com.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Pinterest Inc.',
                'providerPrivacyPolicyUrl' => 'https://policy.pinterest.com/en-gb/privacy-policy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_pinterest_pfob',
                        'host' => '.pinterest.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 3
                    ],
                    [
                        'type' => 'http',
                        'name' => '_b',
                        'host' => '.pinterest.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pinterest_sess',
                        'host' => '.pinterest.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_auth',
                        'host' => '.pinterest.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pinterest_cm',
                        'host' => '.pinterest.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'codeOptIn' =>
                    '<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
                'technicalHandlingNotice' => __(
                    'An opt-in script is only required if you embed Pinterst content outside an iframe. If you only use iframe embeds, you can delete the opt-in code. You must create a content blocker that will block Pinterest until the user gives consent to load it.',
                    RCB_TD
                ),
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
