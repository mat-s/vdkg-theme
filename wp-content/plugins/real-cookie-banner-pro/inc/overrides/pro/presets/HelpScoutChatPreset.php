<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\HelpScoutChatPreset as ProHelpScoutChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * HelpScout Chat cookie preset.
 */
class HelpScoutChatPreset extends \DevOwl\RealCookieBanner\presets\pro\HelpScoutChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Help Scout is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Help Scout PBC',
                'providerPrivacyPolicyUrl' => 'https://www.helpscout.com/company/legal/privacy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'persist:hs-beacon-*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'persist:hs-beacon-message-*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'You have to create a so-called Beacon on <a href="%s" target="_blank">secure.helpscout.net</a> > Manager > Beacon > New Beacon. After creating in the Beacon Customizer, the URL looks like <code>https://secure.helpscout.net/settings/beacons/c676047b-c2e8-45b1-8319-344f4e7e2431/customize</code>. This means that the HelpScout Beacon ID is <code>c676047b-c2e8-45b1-8319-344f4e7e2431</code>.',
                        RCB_TD
                    ),
                    __('https://secure.helpscout.net', RCB_TD)
                ),
                'dynamicFields' => [
                    [
                        'name' => 'helpScoutBeaconId',
                        'label' => __('HelpScout Beacon ID', RCB_TD),
                        'expression' =>
                            '^[A-Za-z0-9]{8,8}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{12,12}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => 'c676047b-c2e8-45b1-8319-344f4e7e2431'
                    ]
                ],
                'codeOptIn' => '<script>!function(e,t,n){function a(){var e=t.getElementsByTagName("script")[0],n=t.createElement("script");n.type="text/javascript",n.async=!0,n.src="https://beacon-v2.helpscout.net",e.parentNode.insertBefore(n,e)}if(e.Beacon=n=function(t,n,a){e.Beacon.readyQueue.push({method:t,options:n,data:a})},n.readyQueue=[],"complete"===t.readyState)return a();e.attachEvent?e.attachEvent("onload",a):e.addEventListener("load",a,!1)}(window,document,window.Beacon||function(){});</script>
<script>window.Beacon(\'init\', \'{{helpScoutBeaconId}}\')</script>',
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
                'tagManagerOptInEventName' => 'help-scout-opt-in',
                'tagManagerOptOutEventName' => 'help-scout-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'help-scout-opt-in',
                'tagManagerOptOutEventName' => 'help-scout-opt-out'
            ]
        ];
    }
}
