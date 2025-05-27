<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ReamazeChatPreset as ProReamazeChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Reamaze Chat cookie preset.
 */
class ReamazeChatPreset extends \DevOwl\RealCookieBanner\presets\pro\ReamazeChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Reamaze is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history, show them proactive hints and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Reamaze',
                'providerPrivacyPolicyUrl' => 'https://www.reamaze.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'rmz.notifications_st',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz.messagePrompts.state',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz.account',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz._vd',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz.routeParams',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz.popup.minimized',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'rmz.siteVisitTime',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'indexedDb',
                        'name' => 'rmz.hideWhoop',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'rmz.seenLabel',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz.ob.triggered',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'pusherTransportEncrypted',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'rmz.ob_conv',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'You can create your own custom chat (called embeddable) and proactive notices (called cues) in your Reamaze admin area > Settings > Embeddables/Cues. The embedding in the opt-in code is just the default example.',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'reamazeAccountName',
                        'label' => __('Reamaze account name', RCB_TD),
                        'invalidMessage' => __('Please provide a valid name!', RCB_TD),
                        'example' => __(
                            '"example", if your Reamaze account is reachable at example.reamaze.com',
                            RCB_TD
                        )
                    ]
                ],
                'codeOptIn' => '<script async src="https://cdn.reamaze.com/assets/reamaze.js"></script>
<script>
    var _support = _support || { ui: {}, user: {} };
    _support["account"] = "{{reamazeAccountName}}";
    _support["ui"]["contactMode"] = "mixed";
    _support["ui"]["enableKb"] = "true";
    _support["ui"]["styles"] = {
        widgetColor: "rgba(16, 162, 197, 1)",
        gradient: true,
    };
    _support["ui"]["widget"] = {
        displayOn: "all",
        label: {
            text: "Let us know if you have any questions! &#128522;",
            mode: "notification",
            delay: 3,
            duration: 30,
            sound: true,
        },
        position: "bottom-right",
        mobilePosition: "bottom-right",
    };
    _support["apps"] = {
        faq: { enabled: true },
        recentConversations: {},
        orders: {},
    };
</script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
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
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'reamaze-opt-in',
                'tagManagerOptOutEventName' => 'reamaze-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'reamaze-opt-in',
                'tagManagerOptOutEventName' => 'reamaze-opt-out'
            ]
        ];
    }
}
