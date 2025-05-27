<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ZendeskChatPreset as ProZendeskChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Zendesk (Chat) cookie preset.
 */
class ZendeskChatPreset extends \DevOwl\RealCookieBanner\presets\pro\ZendeskChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        $cookieHostWithSubdomains = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Zendesk Chat is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Zendesk Inc.',
                'providerPrivacyPolicyUrl' => 'https://www.zendesk.com/company/customers-partners/privacy-policy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '__zlcmid',
                        'host' => $cookieHostWithSubdomains,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ZD-currentTime',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '__zlcstore',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ZD-suid',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ZD-buid',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ZD-store',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'zendeskWidgetKey',
                        'label' => __('Zendesk widget key', RCB_TD),
                        'expression' =>
                            '^[A-Za-z0-9]{8,8}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{12,12}$',
                        'invalidMessage' => __('Please provide a valid key!', RCB_TD),
                        'example' => 'e8e64c99-a026-4exa-aae6-62825180f0a5',
                        'hint' => __(
                            'You can find the Zendesk Widget Key in the Zendesk backend in Settings > Widget > Embed Web Widget as part of the JavaScript Code.',
                            RCB_TD
                        )
                    ]
                ],
                'codeOptIn' =>
                    '<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key={{zendeskWidgetKey}}"></script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $parent['name'],
                    __('https://wordpress.org/plugins/zopim-live-chat/', RCB_TD),
                    'Zendesk Chat Widget WordPress Plugin'
                ),
                'shouldUncheckContentBlockerCheckbox' => \true
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
                'tagManagerOptInEventName' => 'zendesk-chat-opt-in',
                'tagManagerOptOutEventName' => 'zendesk-chat-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'zendesk-chat-opt-in',
                'tagManagerOptOutEventName' => 'zendesk-chat-opt-out'
            ]
        ];
    }
}
