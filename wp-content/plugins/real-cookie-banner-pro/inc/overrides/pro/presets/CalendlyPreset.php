<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\CalendlyPreset as ProCalendlyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Calendly cookie preset.
 */
class CalendlyPreset extends \DevOwl\RealCookieBanner\presets\pro\CalendlyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Calendly allows you to select suitable appointments with us from a calendar and arrange them with us. Cookies are used to uniquely identify the current session, to remember the email address and name of the potential customer for future bookings, and to store consent for third party services.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Calendly LLC',
                'providerPrivacyPolicyUrl' => __(
                    'https://calendly.com/privacy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_calendly_session',
                        'host' => 'calendly.com',
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false,
                        'duration' => 21
                    ],
                    [
                        'type' => 'http',
                        'name' => 'gdpr_trackable',
                        'host' => 'calendly.com',
                        'duration' => 10,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'invitees_invitee',
                        'host' => 'calendly.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'If you embed Calendly in your website and do not use Calendly integration for e.g. Facebook Pixel, PayPal or Stripe, you can enable the "Hide GDPR Banner" option when creating the embed code on calendly.com.',
                    RCB_TD
                ),
                'createContentBlockerNotice' => __(
                    'Calendly always uses Google reCAPTCHA to prevent spam. If Calendly integration for e.g. Facebook Pixel, PayPal or Stripe is used, consent should also be obtained for these services.',
                    RCB_TD
                ),
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
