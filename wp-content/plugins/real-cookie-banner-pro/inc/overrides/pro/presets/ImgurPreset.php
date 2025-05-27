<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ImgurPreset as ProImgurPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Imgur cookie preset.
 */
class ImgurPreset extends \DevOwl\RealCookieBanner\presets\pro\ImgurPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Imgur allows embedding content posted on imgur.com directly into websites.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Imgur Inc.',
                'providerPrivacyPolicyUrl' => 'https://imgur.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'desktopweb_experiments',
                        'host' => 'imgur.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'http',
                        'name' => 'retina',
                        'host' => 'imgur.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'is_authed',
                        'host' => '.imgur.com',
                        'duration' => 10,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'accesstoken',
                        'host' => '.imgur.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'IMGURSESSION',
                        'host' => '.imgur.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_nc',
                        'host' => '.imgur.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'authautologin',
                        'host' => '.imgur.com',
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'G_ENABLED_IDPS',
                        'host' => '.imgur.com',
                        'duration' => 9999,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'IMGURUIDJAFO',
                        'host' => '.imgur.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'SESSIONDATA',
                        'host' => '.imgur.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_fbp',
                        'host' => '.imgur.com',
                        'duration' => 3,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'amplitude_id_*',
                        'host' => '.imgur.com',
                        'duration' => 10,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'addtl_consent',
                        'host' => '.imgur.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'euconsent-v2',
                        'host' => '.imgur.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__qca',
                        'host' => '.imgur.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__auc',
                        'host' => '.imgur.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gid',
                        'host' => '.imgur.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'postpagebeta',
                        'host' => '.imgur.com',
                        'duration' => 70,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '__asc',
                        'host' => '.imgur.com',
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_ga',
                        'host' => '.imgur.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
                'technicalHandlingNotice' => __(
                    'There is no need for an opt-in script, because the Imgur content is normally loaded in an iframe. You must create a content blocker that will block Imagur until the user gives consent to load it.',
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
