<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AwinPublisherMasterTagPreset as ProAwinPublisherMasterTagPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Awin (Publisher MasterTag) cookie preset.
 */
class AwinPublisherMasterTagPreset extends \DevOwl\RealCookieBanner\presets\pro\AwinPublisherMasterTagPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => \sprintf('%s (%s)', $parent['name'], $parent['description']),
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    "Awin is an advertising network for affiliate marketing. In affiliate marketing, commissions are paid to the operator of this website when a lead (e.g. purchase or registration) is generated on the advertiser's website. The Publisher MasterTag allows us to replace links on the website with affiliate links, automatically mark affiliate links as advertising, embed images and videos of products directly into our website, and track clicks on affiliate links more accurately and enriched with additional information about your behavior. Cookies are used to remember which advertisements you have already seen, to assign a browser-specific ID to identify a new click in the same browser, to remember which link you clicked on and which website operator should be credited with your possible commission, the ad group, the ad type as well as the time when you clicked on an advertisement. The validity period of the cookies may vary depending on the advertiser and the referring website.",
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'AWIN AG',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.awin.com/gb/privacy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'bId',
                        'host' => '.awin1.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 6
                    ],
                    [
                        'type' => 'http',
                        'name' => 'aw*',
                        'host' => '.awin1.com',
                        'duration' => 6,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'AWSESS',
                        'host' => '.awin1.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'awpv*',
                        'host' => '.awin1.com',
                        'duration' => 30,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_aw_m_*',
                        'host' => '.awin1.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'awinPublisherId',
                        'label' => __('Awin Publisher ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => '249922',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You find your publisher ID in the <a href="%s" target="_blank">account overview</a> directly blow your account name.',
                                RCB_TD
                            ),
                            __('https://ui.awin.com/user', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' => '<script src="https://www.dwin2.com/pub.{{awinPublisherId}}.min.js"></script>',
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
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
