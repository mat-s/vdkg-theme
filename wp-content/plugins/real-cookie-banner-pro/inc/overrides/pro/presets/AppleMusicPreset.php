<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AppleMusicPreset as ProAppleMusicPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Apple Music preset.
 */
class AppleMusicPreset extends \DevOwl\RealCookieBanner\presets\pro\AppleMusicPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Apple Music allows to embed music from music.apple.com directly into websites. The cookies are used to give an ID to the showed player based on a UNIX timestamp and to collect visited web pages and detailed statistics about user behavior. This data can be linked to the data of users registered on apple.com or a natively installed Apple Music applications.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Apple Distribution International Limited, Apple Inc.',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.apple.com/legal/privacy/en-ww/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'mk-player-tsid',
                        'host' => 'embed.music.apple.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'mtClientConfig_cachedSource_xp_amp_music_webplayer',
                        'host' => 'embed.music.apple.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'mtClientId_*',
                        'host' => 'embed.music.apple.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
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
