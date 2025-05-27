<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\PaddleComPreset as ProPaddleComPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Paddle.com preset.
 */
class PaddleComPreset extends \DevOwl\RealCookieBanner\presets\pro\PaddleComPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Paddle.com is an e-commerce system that allows you to buy products on this website. The provider collects all payment details and forwards them to the preferred payment provider, e.g. Adyen or PayPal. Cookies are used to collect items and settings in a shopping cart, determine the variant of the displayed checkout process and link your way to the checkout with an affiliate partner account.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'paddlejs_affiliate_analytics',
                        'host' => $cookieHost,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false,
                        'duration' => 7
                    ],
                    [
                        'type' => 'http',
                        'name' => 'paddlejs_campaign_affiliate',
                        'host' => $cookieHost,
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'paddlejs_checkout_variant',
                        'host' => $cookieHost,
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'JSESSIONID',
                        'host' => 'checkoutshopper-live.adyen.com',
                        'duration' => 5,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'JSESSIONID',
                        'host' => '.nr-data.net',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'paddleLoadingTime',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ljs-hide',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ljs-source-lang',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ljs-di',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ljs-cache',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ljs-lang',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => 'ljs-visits',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'session',
                        'name' => '*settings',
                        'host' => 'buy.paddle.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'provider' => 'Paddle.com Market Limited',
                'providerPrivacyPolicyUrl' => 'https://paddle.com/privacy-buyers/',
                'technicalHandlingNotice' => __(
                    'The cookie duration of the cookies "paddlejs_affiliate_analytics" and "paddlejs_campaign_affiliate" depends on how you have defined the "Attribution Window" on vendors.paddle.com under Affiliates > Settings. Please adjust the cookie specification according to the settings.<br /><br />Please include the Paddle.com JS SDK outside the cookie banner (if you consider it an essential cookie) or in the "Code executed on page load" field, but not in the "Code executed on opt-in" field, because otherwise affiliate tracking errors may occur.',
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
