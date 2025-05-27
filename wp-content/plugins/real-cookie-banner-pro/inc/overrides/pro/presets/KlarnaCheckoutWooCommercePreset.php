<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\KlarnaCheckoutWooCommercePreset as ProKlarnaCheckoutWooCommercePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Klarna Checkout for WooCommerce cookie preset.
 */
class KlarnaCheckoutWooCommercePreset extends \DevOwl\RealCookieBanner\presets\pro\KlarnaCheckoutWooCommercePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Klarna is a payment service provider that, when selected as a payment method, processes payments for this online store. Depending on the type of payment via Klarna, Klarna classifies the creditworthiness of you as a customer. Cookies are used to give the payment process a unique identification number and to link payment and customer data for the purpose of payment processing.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Klarna Bank AB (publ)',
                'providerPrivacyPolicyUrl' => 'https://www.klarna.com/international/privacy-policy/',
                'technicalDefinitions' => [
                    [
                        'type' => 'local',
                        'name' => '_klarna_sdid_ch',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '*',
                        'host' => 'js.klarna.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '*',
                        'host' => 'js.playground.klarna.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '*',
                        'host' => 'h.online-metrix.met',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ]
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
