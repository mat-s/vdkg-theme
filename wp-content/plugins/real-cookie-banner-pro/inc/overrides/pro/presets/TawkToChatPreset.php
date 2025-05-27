<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TawkToChatPreset as ProTawkToChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Tawk.to Chat cookie preset.
 */
class TawkToChatPreset extends \DevOwl\RealCookieBanner\presets\pro\TawkToChatPreset {
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
                    'tawk.to is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'tawk.to Inc.',
                'providerPrivacyPolicyUrl' => 'https://www.tawk.to/privacy-policy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '__tawkuuid',
                        'host' => $cookieHostWithSubdomains,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 6
                    ],
                    [
                        'type' => 'http',
                        'name' => 'TawkConnectionTime',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'twk_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'You can create your own custom chat widget at <a href="%s" target="_blank">dashboard.tawk.to</a> > Settings > Chat Widget. The chat widget in the opt-in code is just the default example.',
                        RCB_TD
                    ),
                    __('https://dashboard.tawk.to', RCB_TD)
                ),
                'dynamicFields' => [
                    [
                        'name' => 'tawkToId',
                        'label' => __('tawk.to ID', RCB_TD),
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => 'example'
                    ]
                ],
                'codeOptIn' => '<script>
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = "https://embed.tawk.to/{{tawkToId}}/default";
        s1.charset = "UTF-8";
        s1.setAttribute("crossorigin", "*");
        s0.parentNode.insertBefore(s1, s0);
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
                    __('https://wordpress.org/plugins/tawkto-live-chat/', RCB_TD),
                    'Tawk.to WordPress Plugin'
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
                'tagManagerOptInEventName' => 'tawk-opt-in',
                'tagManagerOptOutEventName' => 'tawk-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'tawk-opt-in',
                'tagManagerOptOutEventName' => 'tawk-opt-out'
            ]
        ];
    }
}
