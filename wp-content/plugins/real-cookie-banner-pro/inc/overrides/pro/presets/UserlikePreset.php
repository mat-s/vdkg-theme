<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\UserlikePreset as ProUserlikePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Userlike preset.
 */
class UserlikePreset extends \DevOwl\RealCookieBanner\presets\pro\UserlikePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Userlike is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history, show them proactive hints and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Userlike UG (haftungsbeschränkt)',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.userlike.com/en/terms#privacy-policy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'uslk_umm_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uslk_umm_*_s',
                        'host' => $cookieHost,
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uslk_umm_*_c',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'Please insert the JavaScript code of your Userlike widget as opt-in code. You can find it in the <a href="%s" target="_blank">Userlike widget configurator</a> > Name of the widget > Install > JavaScript Widget code.',
                        RCB_TD
                    ),
                    __('https://userlike.com/en/dashboard/um/config/um_widget/overview', RCB_TD)
                ),
                'codeOptIn' =>
                    '<!-- ' .
                    __('Example opt-in code', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED) .
                    ':
<script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/x575d888c0e94c129f414e60febbaf9210665eb45cc942dea5dw1195978902d4.js"></script> 
-->',
                'ePrivacyUSA' => \true,
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $parent['name'],
                    __('https://wordpress.org/plugins/userlike/', RCB_TD),
                    __('Userlike WordPress Plugin', RCB_TD)
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
                'tagManagerOptInEventName' => 'userlike-opt-in',
                'tagManagerOptOutEventName' => 'userlike-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'userlike-opt-in',
                'tagManagerOptOutEventName' => 'userlike-opt-out'
            ]
        ];
    }
}
