<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ActiveCampaignSiteTrackingPreset as ProActiveCampaignSiteTrackingPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Active Campaign Site Tracking preset.
 */
class ActiveCampaignSiteTrackingPreset extends \DevOwl\RealCookieBanner\presets\pro\ActiveCampaignSiteTrackingPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $name = 'ActiveCampaign Site Tracking';
        return \array_merge($parent, [
            'attributes' => [
                'name' => $name,
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'ActiveCampaign is a marketing platform that analyzes the interaction of potential customers and customers and their communication. The collected data can be used to individualize marketing for each user. The ActiveCampaign Site Tracking combines marketing and sales process with an analysis of the behavior of users on the website, where the behavior of each individual user can be tracked in real time. In addition, Site Tracking connects the collected data with the conversion tracking of ActiveCampaign. Cookies are used to uniquely identify the user and track them across multiple subpages.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'ActiveCampaign, LLC',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.activecampaign.com/legal/privacy-policy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'prism_*',
                        'host' => 'prism.app-us1.com',
                        'duration' => 12,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'activeCampaignAccountId',
                        'label' => __('ActiveCampaign Account ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => '376341751',
                        'hint' => __(
                            'You can find your ActiveCampaign Account ID in the Site Tracking Code. To do so, go to your ActiveCampaign Dashboard under Settings (gear) > Tracking > Install Whitelists and Code > Tracking Code.',
                            RCB_TD
                        )
                    ]
                ],
                'codeOptIn' => '<script>
    (function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
    vgo(\'setAccount\', \'{{activeCampaignAccountId}}\');
    vgo(\'setTrackByDefault\', true);

    vgo(\'process\');
</script>',
                'ePrivacyUSA' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $name,
                    __('https://wordpress.org/plugins/activecampaign-subscription-forms/', RCB_TD),
                    'ActiveCampaign WordPress Plugin'
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
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
