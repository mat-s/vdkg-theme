<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MailchimpForWooCommercePreset as ProMailchimpForWooCommercePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Mailchimp for WooCommerce preset.
 */
class MailchimpForWooCommercePreset extends \DevOwl\RealCookieBanner\presets\pro\MailchimpForWooCommercePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'Mailchimp',
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Mailchimp is a marketing platform that allows us to differentiate audiences and send marketing messages via email. Cookies are used to store on which page the user joined the user journey and the explicit opt-in of the user to collect this email address for email marketing.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'The Rocket Science Group LLC',
                'providerPrivacyPolicyUrl' => 'https://mailchimp.com/legal/privacy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'mailchimp_landing_site',
                        'host' => $cookieHost,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mailchimp_user_email',
                        'host' => $cookieHost,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mailchimp_campaign_id',
                        'host' => $cookieHost,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mailchimp_user_previous_email',
                        'host' => $cookieHost,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'http',
                        'name' => 'mc_user_optin',
                        'host' => 'chimpstatic.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
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
