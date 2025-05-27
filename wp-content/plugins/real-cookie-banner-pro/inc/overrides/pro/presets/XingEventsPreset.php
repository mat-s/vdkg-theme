<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\XingEventsPreset as ProXingEventsPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Xing Events cookie preset.
 */
class XingEventsPreset extends \DevOwl\RealCookieBanner\presets\pro\XingEventsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Xing Events is an e-commerce system that allows you to buy tickets on this website. The provider collects all payment details and forwards them to the preferred payment provider, e.g. PayPal. Cookies are used to uniquely identify the user over multiple page views, to remember the user\'s language, and to store content and personal information in the shopping cart.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'New Work SE',
                'providerPrivacyPolicyUrl' => __(
                    'https://privacy.xing.com/en/privacy-policy',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'amiandoCRT',
                        'host' => '.xing-events.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'AWSALBCORS',
                        'host' => '.xing-events.com',
                        'duration' => 7,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'org.springframework.web.servlet.i18n.CookieLocaleResolver.LOCALE',
                        'host' => '.xing-events.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'anonymousToken',
                        'host' => '.xing-events.com',
                        'duration' => 5,
                        'durationUnit' => 'h',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'JSESSIONID',
                        'host' => '.xing-events.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
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
