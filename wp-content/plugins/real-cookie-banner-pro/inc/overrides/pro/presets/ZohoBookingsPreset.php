<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ZohoBookingsPreset as ProZohoBookingsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Zoho Bookings cookie preset.
 */
class ZohoBookingsPreset extends \DevOwl\RealCookieBanner\presets\pro\ZohoBookingsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Zoho Bookings is a planning software the allows you to book book appointments on our website. The cookies are used for visitor security by preventing the faking of cross-site requests.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' =>
                    'Zoho Corporation, Zoho Corporation B.V., Zoho Corporation Pvt. Ltd., Zoho Technologies Private Limited, Zoho Corporation Pte. Ltd., Zoho (Beijing) Technology Co., Ltd., Zoho Japan Corporation, Zoho Corporation Pty. Ltd.',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.zoho.com/privacy.html',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'zccpn',
                        'host' => '.zohobookings.eu',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'The technical host of the cookie <code>zccpn</code> must be adjusted manually. It has to be the full domain of your Zoho Workspace.',
                        RCB_TD
                    ),
                    __('Expample embed code for your widget:', RCB_TD),
                    \sprintf(
                        '<code>%s</code>',
                        esc_html(
                            "<iframe width='100%' height='585px' src='https://zoho-devowl.zohobookings.eu/portal-embed#/customer/demowelt' frameborder='0' allowfullscreen=''></iframe>"
                        )
                    ),
                    __(
                        'In this case, <code>zoho-devowl</code> is the Zoho Workspace name and the technical host of the cookie is <code>devowl.zohobookings.eu</code>.',
                        RCB_TD
                    )
                ]),
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
