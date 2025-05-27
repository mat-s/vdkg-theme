<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\LinkedInAdsPreset as ProLinkedInAdsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * LinkedInAds cookie preset.
 */
class LinkedInAdsPreset extends \DevOwl\RealCookieBanner\presets\pro\LinkedInAdsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'LinkedIn Insight-Tag',
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'LinkedIn Insight-Tag helps determine if you are the target audience for presenting ads within the LinkedIn advertising network. Thereby you can be targeted in a target group created by us (e.g. people who have liked a certain company). In addition, the data is used for so-called "remarketing" in order to be able to display targeted advertising again to users who have already clicked on one of our ads within the Linkedin advertising network or visited our website. The LinkedIn Insight tag also makes it possible to track the effectiveness of Linkedin advertising (e.g. conversation tracking). Cookies are used to distinguish users and record their behavior on the website in detail and link this data with advertising data from the Linkedin advertising network. This data can be linked to the data of users registered on linkedin.com with their Linkedin accounts.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'LinkedIn Ireland Unlimited Company',
                'providerPrivacyPolicyUrl' => __(
                    'https://linkedin.com/legal/privacy-policy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'lang',
                        'host' => '.linkedin.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'bcookie',
                        'host' => '.linkedin.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'AnalyticsSyncHistory',
                        'host' => '.linkedin.com',
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'UserMatchHistory',
                        'host' => '.linkedin.com',
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'lang',
                        'host' => '.ads.linkedin.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'li_gc',
                        'host' => '.linkedin.com',
                        'duration' => 23,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'lidc',
                        'host' => '.linkedin.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'li_mc',
                        'host' => '.linkedin.com',
                        'duration' => 23,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'liap',
                        'host' => '.linkedin.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'linkedinPaternerId',
                        'label' => 'LinkedIn Partner ID',
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => '249922',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can find an article in LinkedIn\'s knowledge base that explains <a href="%s" target="_blank">where to find the LinkedIn Partner ID</a> in your LinkedIn Ads account.',
                                RCB_TD
                            ),
                            __('https://www.linkedin.com/help/lms/answer/a415871', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' => '<script>
_linkedin_partner_id = "{{linkedinPaternerId}}";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script>
<script>
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid={{linkedinPaternerId}}&fmt=gif" />
</noscript>',
                'ePrivacyUSA' => \true,
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
                'tagManagerOptInEventName' => 'linkedin-ads-opt-in',
                'tagManagerOptOutEventName' => 'linkedin-ads-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'linkedin-ads-opt-in',
                'tagManagerOptOutEventName' => 'linkedin-ads-opt-out'
            ]
        ];
    }
}
