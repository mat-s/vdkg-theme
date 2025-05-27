<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\SpotifyPreset as ProSpotifyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Spotify preset.
 */
class SpotifyPreset extends \DevOwl\RealCookieBanner\presets\pro\SpotifyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Spotify allows embedding music from spotify.com directly into websites. The cookies are used to define the viewport of the music player and to collect visited websites and detailed statistics about the user behavior. This data can be linked to the data of users registered on spotify.com or a native installed Spotify application.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Spotify AB',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.spotify.com/uk/legal/privacy-policy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'com.spotify.rcs.installationId',
                        'host' => 'open.spotify.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'anonymous:nav-bar-width',
                        'host' => 'open.spotify.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sp_landing',
                        'host' => '.spotify.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sp_t',
                        'host' => '.spotify.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'What do you have to consider when integrating %1$s into your website? <a href="%2$s" target="_blank">Learn more about it in our blog!</a>',
                        RCB_TD
                    ),
                    $parent['name'],
                    esc_attr(__('https://devowl.io/2022/spotify-gdpr-website/', RCB_TD))
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
