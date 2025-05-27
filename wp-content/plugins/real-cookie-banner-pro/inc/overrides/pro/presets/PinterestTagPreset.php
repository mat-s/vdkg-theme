<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\PinterestTagPreset as ProPinterestTagPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Pinterest Tag cookie preset.
 */
class PinterestTagPreset extends \DevOwl\RealCookieBanner\presets\pro\PinterestTagPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Pinterest Tag helps to determine whether you are the target audience for presenting ads within the Pinterest advertising network. The Pinterest Tag also allows to track the effectiveness of Pinterest Ads. Cookies are used to differentiate users and to record their behavior on the website in detail including non-sensitive keystrokes such as typing in search fields and to link this data with advertising data from the Pinterest advertising network. This data can be linked to the data of users registered on pinterest.com with their Pinterest accounts.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Pinterest Inc.',
                'providerPrivacyPolicyUrl' => 'https://policy.pinterest.com/en-gb/privacy-policy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_pin_unauth',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 2
                    ],
                    [
                        'type' => 'http',
                        'name' => '_derived_epik',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pinterest_sess',
                        'host' => '.pinterest.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pinterest_ct_rt',
                        'host' => '.ct.pinterest.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pinterest_ct_ua',
                        'host' => '.ct.pinterest.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'technicalHandlingNotice' => \join('<br/><br/>', [
                    __(
                        'The "Metadata Enrichment" feature is not supported by this template, because in normal WordPress websites the email address of the visitor of your website is not known, but it would have to be transmitted to Pinterest.',
                        RCB_TD
                    ),
                    __(
                        'If you already embedded the Pinterest Tag through a third plugin, please delete the following opt-in script and create a matching content blocker in addition to this cookie.',
                        RCB_TD
                    )
                ]),
                'dynamicFields' => [
                    [
                        'name' => 'pinterestTagId',
                        'label' => __('Pinterest Tag ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '2512582458933',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can view your Tag ID in <a href="%s" target="_blank">Pinterest Ads</a> under Ads > Conversions > Add code to website > Add code. It is displayed in the top right corner of the modal.',
                                RCB_TD
                            ),
                            __('https://ads.pinterest.com/', RCB_TD)
                        )
                    ]
                ],
                'createContentBlockerNotice' => __(
                    'You only need a content blocker if you embed the Pinterest Tag through a third party plugin or use event codes (<code>pintrk</code> function) for the Pinterest Tag.',
                    RCB_TD
                ),
                'codeOptIn' => '<script>
!function(e){if(!window.pintrk){window.pintrk = function () {
window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
  n=window.pintrk;n.queue=[],n.version="3.0";var
  t=document.createElement("script");t.async=!0,t.src=e;var
  r=document.getElementsByTagName("script")[0];
  r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
pintrk(\'load\', \'{{pinterestTagId}}\');
pintrk(\'page\');
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid={{pinterestTagId}}&noscript=1" />
</noscript>',
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
                'tagManagerOptInEventName' => 'pinterest-tag-opt-in',
                'tagManagerOptOutEventName' => 'pinterest-tag-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'pinterest-tag-opt-in',
                'tagManagerOptOutEventName' => 'pinterest-tag-opt-out'
            ]
        ];
    }
}
