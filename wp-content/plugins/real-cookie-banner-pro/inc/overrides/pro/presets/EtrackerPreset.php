<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EtrackerPreset as ProEtrackerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * etracker cookie preset.
 */
class EtrackerPreset extends \DevOwl\RealCookieBanner\presets\pro\EtrackerPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => __('etracker: basic tracking', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'etracker is used to create detailed statistics about user behavior on the website. The data collected is used to optimize our online offering and our web presence. The data that may allow a reference to an individual person, such as the IP address, login or device identifiers, are anonymized or pseudonymized as soon as possible. No other use is made of the data, nor is it merged with other data or passed on to third parties. The data generated with etracker is processed and stored by etracker exclusively in Germany and is thus subject to strict data protection laws. We do not use cookies for this web analysis.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'etracker GmbH',
                'legalBasis' => 'legitimate-interest',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.etracker.com/en/data-privacy-statement/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'isEmbeddingOnlyExternalResources' => \true,
                'dynamicFields' => [
                    [
                        'name' => 'etrackerAccountKey',
                        'label' => __('etracker Account Key', RCB_TD),
                        'expression' => '^\\w+$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => 'kdwwi2',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can find your etracker account key under <a href="%s" target="_blank">Account info > Settings> Account</a> of your etracker account.',
                                RCB_TD
                            ),
                            __('https://newapp.etracker.com/#/report/accountSettings/accountKey', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' =>
                    '<script id="_etLoader" data-block-cookies="true" data-cookie-lifetime="13" data-secure-code="{{etrackerAccountKey}}" src="//code.etracker.com/code/e.js" async></script>',
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'This service template is designed for tracking without consent on the legal basis of legitimate interest. No cookies are set by etracker for tracking and collected data (as of February 2022) is only processed within the EU. The visitor of your website can object to tracking by disabling this service in your cookie banner.',
                        RCB_TD
                    ),
                    \sprintf(
                        // translators:
                        __(
                            'We also recommend that you deactivate the non-aggregated reporting via the <a href="%s" target="_blank">dashboard</a> under <i>menu (top left) > Account-ID > Settings > Privacy > Consent-free tracking cookies in accordance with CNIL guidelines</i> to ensure that there is definitely no personal reference for the collected data.',
                            RCB_TD
                        ),
                        __('https://newapp.etracker.com/', RCB_TD)
                    )
                ]),
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
