<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GiphyPreset as ProGiphyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Giphy cookie preset.
 */
class GiphyPreset extends \DevOwl\RealCookieBanner\presets\pro\GiphyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Giphy allows embedding content posted on giphy.com directly into websites. Cookies are used to remember the settings in the video-, audio- or GIF-player, to remember if e.g. tooltips have already been displayed, to apply any further consents obtained, to analyze and record in detail the behavior during the use of Giphy and to use the behavior analysis and viewed content for remarketing.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Giphy, Inc.',
                'providerPrivacyPolicyUrl' => 'https://support.giphy.com/hc/en-us/articles/360032872931',
                'technicalDefinitions' => [
                    [
                        'type' => 'session',
                        'name' => 'giphyPingbackId',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'has-seen-supercut-banner',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'redux',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'loop-autoplay',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'local-favorites',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'has-seen-bulk-edit-tooltip',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'has-clips-muted',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'has-seen-local-fav-message',
                        'host' => 'giphy.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'didomi_accept_cookie',
                        'host' => '.giphy.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'csrftoken',
                        'host' => '.giphy.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_ga',
                        'host' => '.giphy.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gcl_au',
                        'host' => '.giphy.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'didomi_token',
                        'host' => '.giphy.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gid',
                        'host' => '.giphy.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_gat',
                        'host' => '.giphy.com',
                        'duration' => 1,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ]
                ],
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
