<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\StripePreset as ProStripePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Stripe preset.
 */
class StripePreset extends \DevOwl\RealCookieBanner\presets\pro\StripePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Stripe is an online payment service with which payments can be made in this online store, e.g. by credit card. Payment data is collected directly by or transmitted to Stripe, but never stored by the operator of the online store itself. Customer data is shared with Stripe for the purpose of processing orders. Cookies are used for fraud prevention and detection.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Stripe, Inc.',
                'providerPrivacyPolicyUrl' => 'https://stripe.com/privacy',
                // Stripe preset should be used only for `extends` presets as it does not provide a standalone script
                // Please define all technical definitions in the proper child preset
                'technicalDefinitions' => [],
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
