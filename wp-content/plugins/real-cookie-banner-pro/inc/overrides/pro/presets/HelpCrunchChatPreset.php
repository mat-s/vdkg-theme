<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\HelpCrunchChatPreset as ProHelpCrunchChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Helpcrunch Chat cookie preset.
 */
class HelpCrunchChatPreset extends \DevOwl\RealCookieBanner\presets\pro\HelpCrunchChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'HelpCrunch is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'HelpCrunch Corporation',
                'providerPrivacyPolicyUrl' => 'https://helpcrunch.com/privacy-policy.html',
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-visits-count',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-UndeliveredMessages',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-device-referrer',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-last-message',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-received-triggers-count',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-visit-end-time',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-triggers',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-device-source',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-chat-window-state',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-last-trigger-message',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-page-views',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-visit-start-time',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-last-trigger-time',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-chat-id',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-triggers-open',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-user-location',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-device',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-triggers-reply',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-last-agent-message',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'helpcrunch.com-*-*-triggers-list',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'debug',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'You can find all HelpCrunch variables in your HelpCrunch backend under Settings > Website Widgets > [widget name] > CMS Plugin Code. Please note that you need to use GTM Code if you want to use JavaScript code directly from your HelpCrunch backend (even if you do not use Google Tag Manager, since Real Cookie Banner works in a similar way and HelpCrunch\'s default JavaScript code does not work with this method).',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'helpCrunchApplicationId',
                        'label' => __('HelpCrunch application ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please provide a valid number!', RCB_TD),
                        'example' => '1'
                    ],
                    [
                        'name' => 'helpCrunchOrganization',
                        'label' => __('HelpCrunch organization', RCB_TD),
                        'invalidMessage' => __('Please fill in a organization!', RCB_TD),
                        'example' => 'devowl'
                    ],
                    [
                        'name' => 'helpCrunchApplicationSecret',
                        'label' => __('HelpCrunch application secret', RCB_TD),
                        'invalidMessage' => __('Please provide a secret!', RCB_TD),
                        'example' =>
                            'R3qHxkWWKj0M3PEeZz0SNYhGQKY/vv9W6xVhdlEWNaVj8Aj7PeZaKP7EvxnZDvufepsnGjBjs5y+S8LsTTrTrg=='
                    ]
                ],
                'codeOptIn' => '<script>
(function(w,d){
  w.HelpCrunch=function(){w.HelpCrunch.q.push(arguments)};w.HelpCrunch.q=[];
  function r(){var s=document.createElement(\'script\');s.id=\'helpcrunch-widget-script\';s.async=1;s.type=\'text/javascript\';s.src=\'https://widget.helpcrunch.com/\';(d.body||d.head).appendChild(s);}
  w.helpcrunchInitWidget = r;
})(window, document);

function runHelpCrunchMethods() {
  HelpCrunch(\'init\', \'{{helpCrunchOrganization}}\', {
    applicationId: {{helpCrunchApplicationId}},
    applicationSecret: \'{{helpCrunchApplicationSecret}}\'
  });

  HelpCrunch(\'showChatWidget\');
}

helpcrunchInitWidget();
runHelpCrunchMethods();
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
                'tagManagerOptInEventName' => 'helpcrunch-opt-in',
                'tagManagerOptOutEventName' => 'helpcrunch-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'helpcrunch-opt-in',
                'tagManagerOptOutEventName' => 'helpcrunch-opt-out'
            ]
        ];
    }
}
