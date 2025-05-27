<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EtrackerWithConsentPreset as ProEtrackerWithConsentPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * etracker with consent cookie preset.
 */
class EtrackerWithConsentPreset extends \DevOwl\RealCookieBanner\presets\pro\EtrackerWithConsentPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => __('etracker: enhanced tracking', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'etracker is used to create detailed statistics about user behavior on the website. The data collected is used to optimize our online offering and our web presence. The data that may allow a reference to an individual person, such as the IP address, login or device identifiers, are anonymized or pseudonymized as soon as possible. No other use is made of the data, nor is it merged with other data or passed on to third parties. The data generated with etracker is processed and stored by etracker exclusively in Germany and is thus subject to strict data protection laws. Cookies are used to enable statistical coverage analysis of this website, measurement of the success of our online marketing measures, and testing procedures, for example, to test and optimize different versions of our online offering or its components.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'etracker GmbH',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.etracker.com/en/data-privacy-statement/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => 'et_allow_cookies',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'et_allow_cookies',
                        'host' => $cookieHost,
                        'duration' => 16,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'BT_pdc',
                        'host' => $cookieHost,
                        'duration' => 13,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'BT_sdc',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
                'codeOptIn' => '<script>
document.addEventListener("RCB/OptIn/All", function(e) {
    e.detail.ready.then(function() {
        if (typeof _etracker !== \'undefined\') {
            _etracker.enableCookies();
        }
    });
}, { once: true });
</script>',
                'codeOptOut' => '<script>
if (typeof _etracker !== \'undefined\' && _etracker.areCookiesEnabled()) {
_etracker.disableCookies();
}
</script>',
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'This service template is designed for tracking with consent. In order for the tracking to work, you must also create the service "etracker: Tracking without consent" resp. "etracker: basic tracking", as this service only enriches the tracking with additional data in the case of consent.',
                        RCB_TD
                    ),
                    \sprintf(
                        // translators:
                        __(
                            'In order for the consent to be taken into account, you must activate the toggle "Opt-In active" via the <a href="%s" target="_blank">dashboard</a> under <i>menu (top left) > Account-ID > Settings > Privacy > Tracking Opt-In and agreement</i>, but then switch to "own Opt-In" so that etracker does not display its own consent dialog, but instead uses the consent collected by Real Cookie Banner.',
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
