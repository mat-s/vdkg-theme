<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TidioChatPreset as ProTidioChatPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Tidio Chat cookie preset.
 */
class TidioChatPreset extends \DevOwl\RealCookieBanner\presets\pro\TidioChatPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Tidio is a customer service tool that provides live chat for websites. The cookies are used to identify the user, associate previous messages with their chat history and collect detailed statistics on his/her behavior.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Tidio LLC',
                'providerPrivacyPolicyUrl' => 'https://www.tidio.com/privacy-policy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'tidio_state_*',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'tidio_state_*_lastActivity',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'tidio_state_*_widget_position',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'You get your Tidio JS ID on <a href="%s" target="_blank">tidio.com</a> under Settings > Live Chat > Integration > JavaScript in the given JavaScript snipped. You can adjust the appearance of the chat at tidio.com under Settings > Live Chat > Appearance.',
                        RCB_TD
                    ),
                    __('https://tidio.com', RCB_TD)
                ),
                'dynamicFields' => [
                    [
                        'name' => 'tidioJsId',
                        'label' => __('Tidio JS ID', RCB_TD),
                        'expression' => '^[A-Za-z0-9]{32,32}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => 'nr7oxtj1axz7bnn6s3c9kzk5x1inni76'
                    ]
                ],
                'codeOptIn' => '<script src="//code.tidio.co/{{tidioJsId}}.js" async></script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $parent['name'],
                    __('https://wordpress.org/plugins/tidio-live-chat/', RCB_TD),
                    'Tidio WordPress Plugin'
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
                'tagManagerOptInEventName' => 'tidio-opt-in',
                'tagManagerOptOutEventName' => 'tidio-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'tidio-opt-in',
                'tagManagerOptOutEventName' => 'tidio-opt-out'
            ]
        ];
    }
}
