<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MouseflowPreset as ProMouseflowPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Mouseflow preset.
 */
class MouseflowPreset extends \DevOwl\RealCookieBanner\presets\pro\MouseflowPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        $cookieHostMain = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Mouseflow is a service for behavior analysis. It creates heat maps and session records of the website user. The cookies are used to identify the user across multiple sub-pages and to link the data collected during session recordings.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Mouseflow ApS',
                'providerPrivacyPolicyUrl' => 'https://mouseflow.com/privacy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'mf_user',
                        'host' => $cookieHostMain,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 3
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mf_*',
                        'host' => $cookieHostMain,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'mf_replaceHashes',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'mf_transmitQueue',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'mf_initialDomQueue',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'mouseFlowWebsiteId',
                        'label' => __('Mouseflow Website ID', RCB_TD),
                        'expression' =>
                            '^[A-Za-z0-9]{8,8}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{12,12}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '3f5e37d4-14a8-4b9c-8672-0132bf15372f',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can find your Mouseflow website ID by hovering over the appropriate website at <a href="%s" target="_blank">eu.mouseflow.com/websites</a>. You will then see a gear icon that you can click on. In the settings that appear, you should find a <code>Website ID</code> field.',
                                RCB_TD
                            ),
                            __('http://eu.mouseflow.com/websites', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' => '<script>
window._mfq = window._mfq || [];
(function() {
  var mf = document.createElement("script");
  mf.type = "text/javascript"; mf.defer = true;
  mf.src = "//cdn.mouseflow.com/projects/{{mouseFlowWebsiteId}}.js";
  document.getElementsByTagName("head")[0].appendChild(mf);
})();
</script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $parent['name'],
                    __('https://wordpress.org/plugins/mouseflow-for-wordpress/', RCB_TD),
                    'Mouseflow WordPress Plugin'
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
                'tagManagerOptInEventName' => 'mouseflow-opt-in',
                'tagManagerOptOutEventName' => 'mouseflow-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'mouseflow-opt-in',
                'tagManagerOptOutEventName' => 'mouseflow-opt-out'
            ]
        ];
    }
}
