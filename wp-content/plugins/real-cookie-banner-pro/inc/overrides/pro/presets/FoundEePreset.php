<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FoundEePreset as ProFoundEePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * found.ee cookie preset.
 */
class FoundEePreset extends \DevOwl\RealCookieBanner\presets\pro\FoundEePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Found.ee is a marketing platform that allows users to be targeted with promotional messages on Found.ee landing pages, on this website and in email campaigns. Cookies are used to distinguish users and track their behavior on the website in detail. The data is used to serve targeted and personalized advertising on this website or landing pages of this website created with Found.ee. If known, the data collected can be linked to the e-mail address of the visitor, insofar as this is known from the email marketing.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Thinketing Inc.',
                'providerPrivacyPolicyUrl' => 'https://found.ee/super/usersgdpr',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'anj',
                        'host' => '.adnxs.com',
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 3
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uuid2',
                        'host' => '.adnxs.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'uid',
                        'host' => $cookieHost,
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'cookieAcceptance',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'foundeePixelId',
                        'label' => __('Found.ee Pixel ID', RCB_TD),
                        'expression' =>
                            '^[A-Za-z0-9]{8,8}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{12,12}$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => '3f5e37d4-14a8-4b9c-8672-0132bf15372f',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can find your pixel ID in the <a href="%s" target="_blank">Found.ee Pixel Management</a> in the DMP pixel JavaScript code.',
                                RCB_TD
                            ),
                            __('https://found.ee/super/pixels', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' =>
                    '<script>!function(e,t,n,s,a,c,p,i,o,u){e[a]||((i=e[a]=function(){i.process?i.process.apply(i,arguments):i.queue.push(arguments)}).queue=[],i.pixelId="{{foundeePixelId}}",i.t=1*new Date,(o=t.createElement(n)).async=1,o.src="https://found.ee/dmp/pixel.js?t="+864e5*Math.ceil(new Date/864e5),(u=t.getElementsByTagName(n)[0]).parentNode.insertBefore(o,u))}(window,document,"script",0,"foundee");foundee(\'\', \'Y\');</script>',
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
