<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FreshchatPreset as ProFreshchatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Freshchat cookie preset.
 */
class FreshchatPreset extends \DevOwl\RealCookieBanner\presets\pro\FreshchatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        $cookieHostWithSubdomains = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Freshchat is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Freshworks Inc.',
                'providerPrivacyPolicyUrl' => 'https://www.freshworks.com/privacy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_fw_crm_v',
                        'host' => $cookieHostWithSubdomains,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'local',
                        'name' => '{{freshchatToken}}',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '{{freshchatToken}}',
                        'host' => 'https://wchat.eu.freshchat.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'fc-emoji-picker',
                        'host' => 'https://wchat.eu.freshchat.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'hop-*',
                        'host' => 'https://wchat.eu.freshchat.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'debug',
                        'host' => 'https://wchat.eu.freshchat.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'You can find the host and token for the Freshchat widget in your Freshchat backend under Settings > Web Messenger. The information is included in the JavaScript code. Please note that the original code from Freshdesk will not work because it can only be loaded without a consent tool like Real Cookie Banner. The following opt-in code is therefore slightly modified.',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'freshchatHost',
                        'label' => __('Freshchat host', RCB_TD),
                        'expression' =>
                            '^\\.?(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9])\\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9-]*[A-Za-z0-9])$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => 'wchat.eu.freshchat.com'
                    ],
                    [
                        'name' => 'freshchatToken',
                        'label' => __('Freshchat token', RCB_TD),
                        'expression' =>
                            '^[A-Za-z0-9]{8,8}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{12,12}$',
                        'invalidMessage' => __('Please provide a valid token!', RCB_TD),
                        'example' => '3f5e37d4-14a8-4b9c-8672-0132bf15372f'
                    ]
                ],
                'codeOptIn' => '<script>
    function initFreshChat() {
        window.fcWidget.init({
            token: "{{freshchatToken}}",
            host: "https://{{freshchatHost}}",
        });
    }
    function initialize(i, t) {
        var e;
        i.getElementById(t) ? initFreshChat() : (((e = i.createElement("script")).id = t), (e.async = !0), (e.src = "https://{{freshchatHost}}/js/widget.js"), (e.onload = initFreshChat), i.head.appendChild(e));
    }
    function initiateCall() {
        initialize(document, "freshchat-js-sdk");
    }
    initiateCall();
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
                'tagManagerOptInEventName' => 'freshchat-opt-in',
                'tagManagerOptOutEventName' => 'freshchat-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'freshchat-opt-in',
                'tagManagerOptOutEventName' => 'freshchat-opt-out'
            ]
        ];
    }
}
