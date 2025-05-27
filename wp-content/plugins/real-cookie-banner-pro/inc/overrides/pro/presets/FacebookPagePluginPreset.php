<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FacebookPagePluginPreset as ProFacebookPagePluginPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Page Plugin cookie preset.
 */
class FacebookPagePluginPreset extends \DevOwl\RealCookieBanner\presets\pro\FacebookPagePluginPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Facebook Page Plugin shows information about a specific Facebook fan page that the visitor of this website may like. The cookies are used to collect likes content as well as to collect visited websites. This data can be linked to the data of users registered on facebook.com with their Facebook accounts.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Meta Platforms Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://www.facebook.com/about/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'presence',
                        'host' => '.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'wd',
                        'host' => '.facebook.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'spin',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'fr',
                        'host' => '.facebook.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'xs',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sb',
                        'host' => '.facebook.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'dpr',
                        'host' => '.facebook.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'datr',
                        'host' => '.facebook.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'c_user',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'locale',
                        'host' => '.facebook.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'session',
                        'name' => 'TabId',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'Session',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'hb_timestamp',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_video_bandwidthEstimate',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'CacheStorageVersion',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'RTC_CALL_SUMMARY_summary',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'marketplaceLoggingBookmarkLogTimestamp',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'signal_flush_timestamp',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_cs_marauder_last_session_id',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'channel_sub:*',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'JewelBase:count-updated',
                        'host' => 'www.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
                'codeOptIn' =>
                    '<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="' .
                    \DevOwl\RealCookieBanner\lite\presets\FacebookLikePreset::createScriptNonce() .
                    '"></script>',
                'technicalHandlingNotice' => __(
                    'The default opt-in script is optimized for the use of the Facebook Page Plugin via the Facebook JavaScript SDK in the opt-in script. If you use the Facebook Page Plugin as an iframe or have already injected the Facebook SDK somewhere else (e. g. via a plugin), you must create a content blocker to block it before you have the consent of the user and delete the default opt-in script below.',
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
