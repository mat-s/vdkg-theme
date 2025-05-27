<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\KlaviyoPreset as ProKlaviyoPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Klaviyo cookie preset.
 */
class KlaviyoPreset extends \DevOwl\RealCookieBanner\presets\pro\KlaviyoPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $name = 'Klaviyo';
        return \array_merge($parent, [
            'attributes' => [
                'name' => $name,
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Klaviyo is a service for collecting detailed statistics about user behavior on the website. This includes, details about the devices used to access the websites (such as the IP address, operating system and web browser), date and time of visit, details about how people interact with the emails sent by this website, websites from which visitors were redirected to this website, and search terms in the search of this website. In addition, contact information and purchase history of buyers will be transmitted to Klaviyo. Klaviyo uses the collected data to differentiate target groups via its marketing platform and to send personalized marketing messages via email and SMS. Klaviyo may also collect collected personal data for its own business purposes, such as business contact information of potential customers or resumes of job applicants. Cookies are used to assign a unique identification number to the visitor and to be able to identify them again over several page requests and to be able to link the data of several page requests.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Klaviyo Inc.',
                'providerPrivacyPolicyUrl' => 'https://www.klaviyo.com/legal/privacy-policy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '__kla_id',
                        'host' => \DevOwl\RealCookieBanner\Utils::host(
                            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT
                        ),
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 2
                    ]
                ],
                'ePrivacyUSA' => \true,
                'deleteTechnicalDefinitionsAfterOptOut' => \true
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
