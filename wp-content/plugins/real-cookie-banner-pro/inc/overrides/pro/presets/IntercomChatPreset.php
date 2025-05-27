<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\IntercomChatPreset as ProIntercomChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Intercom (Chat) cookie preset.
 */
class IntercomChatPreset extends \DevOwl\RealCookieBanner\presets\pro\IntercomChatPreset {
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
                    'Intercom is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Intercom Inc., Intercom R&D Unlimited Company, Intercom Software UK Limited',
                'providerPrivacyPolicyUrl' => 'https://www.intercom.com/legal/terms-and-policies#privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'intercom-session-*',
                        'host' => $cookieHostWithSubdomains,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false,
                        'duration' => 7
                    ],
                    [
                        'type' => 'local',
                        'name' => 'intercom-state-*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'intercom.played-notifications',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'intercom-id-*',
                        'host' => $cookieHostWithSubdomains,
                        'duration' => 9,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'Go to "Message Settings" in the Intercom backend. You should have a URL like <code>https://app.intercom.com/a/apps/idx85jlx/messenger</code> in your address bar. In this case <code>idx85jlx</code> is your Intercom App ID.',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'intercomAppId',
                        'label' => __('Intercom application ID', RCB_TD),
                        'expression' => '^[A-Za-z0-9]{8,}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => 'idb9xfhn'
                    ]
                ],
                'codeOptIn' => '<script>
    window.intercomSettings = {
        app_id: "{{intercomAppId}}",
    };
</script>
<script>
    (function () {
        var w = window;
        var ic = w.Intercom;
        if (typeof ic === "function") {
            ic("reattach_activator");
            ic("update", w.intercomSettings);
        } else {
            var d = document;
            var i = function () {
                i.c(arguments);
            };
            i.q = [];
            i.c = function (args) {
                i.q.push(args);
            };
            w.Intercom = i;
            var l = function () {
                var s = d.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://widget.intercom.io/widget/{{intercomAppId}}";
                var x = d.getElementsByTagName("script")[0];
                x.parentNode.insertBefore(s, x);
            };
            l();
        }
    })();
</script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $parent['name'],
                    __('https://wordpress.org/plugins/intercom/', RCB_TD),
                    'Intercom WordPress Plugin'
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
                'tagManagerOptInEventName' => 'intercom-opt-in',
                'tagManagerOptOutEventName' => 'intercom-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'intercom-opt-in',
                'tagManagerOptOutEventName' => 'intercom-opt-out'
            ]
        ];
    }
}
