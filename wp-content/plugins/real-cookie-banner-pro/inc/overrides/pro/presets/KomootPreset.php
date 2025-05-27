<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\KomootPreset as ProKomootPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Komoot cookie preset.
 */
class KomootPreset extends \DevOwl\RealCookieBanner\presets\pro\KomootPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Komoot displays maps with marked tours and pictures of these tours. Cookies are used to recognize the visitor, to save settings such as the colors of the map and to save which tours the visitor has called from which website.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'komoot GmbH',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.komoot.de/privacy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'JSESSIONID',
                        'host' => '.nr-data.net',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'kmt_config_web',
                        'host' => 'www.komoot.de',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'theme-ui-color-mode',
                        'host' => 'www.komoot.de',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ka_campain_attribution',
                        'host' => 'www.komoot.de',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'SCREEN_VISITED',
                        'host' => 'www.komoot.de',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'Please note that you should disable the "Share Counters" feature in your AddThis dashboard. This feature includes scripts of the embedded services (e.g. Facebook, Twitter, Pinterest) and transfers data without consent.',
                    RCB_TD
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
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
