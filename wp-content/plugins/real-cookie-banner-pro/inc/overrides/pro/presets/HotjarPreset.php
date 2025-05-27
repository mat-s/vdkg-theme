<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\HotjarPreset as ProHotjarPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Hotjar cookie preset.
 */
class HotjarPreset extends \DevOwl\RealCookieBanner\presets\pro\HotjarPreset {
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
                    'Hotjar is a service for behavior analysis and collecting user feedback. It creates heat maps and session records of the website user and plays out surveys. The cookies are used to identify the user across multiple sub-pages, to store the status of surveys, to control the play of displays and to link data collected during session recordings.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Hotjar Ltd.',
                'providerPrivacyPolicyUrl' => 'https://www.hotjar.com/legal/policies/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_hjClosedSurveyInvites',
                        'host' => $cookieHost,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false,
                        'duration' => 365
                    ],
                    [
                        'type' => 'local',
                        'name' => '_hjDonePolls',
                        'host' => $cookieHost,
                        'duration' => 365,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjMinimizedPolls',
                        'host' => $cookieHost,
                        'duration' => 365,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjShownFeedbackMessage',
                        'host' => $cookieHost,
                        'duration' => 365,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjid',
                        'host' => $cookieHostWithSubdomains,
                        'duration' => 0,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \true
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjRecordingLastActivity',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjTLDTest',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjUserAttributesHash',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjCachedUserAttributes',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_hjLocalStorageTest',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 's',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjIncludedInSample',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjAbsoluteSessionInProgress',
                        'host' => $cookieHostWithSubdomains,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => '_hjid',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjDonePolls',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_hjIncludedInPageviewSample',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'hjId',
                        'label' => __('Hotjar ID', RCB_TD),
                        'expression' => '^\\d{5,}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '1234567'
                    ]
                ],
                'codeOptIn' => '<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:{{hjId}},hjsv:6};
        a=o.getElementsByTagName(\'head\')[0];
        r=o.createElement(\'script\');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,\'https://static.hotjar.com/c/hotjar-\',\'.js?sv=\');
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
                    __('https://wordpress.org/plugins/hotjar/', RCB_TD),
                    __('official Hotjar WordPress Plugin')
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
                'tagManagerOptInEventName' => 'hotjar-opt-in',
                'tagManagerOptOutEventName' => 'hotjar-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'hotjar-opt-in',
                'tagManagerOptOutEventName' => 'hotjar-opt-out'
            ]
        ];
    }
}
