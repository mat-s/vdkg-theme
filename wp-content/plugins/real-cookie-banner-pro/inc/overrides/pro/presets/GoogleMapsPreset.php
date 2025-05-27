<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GoogleMapsPreset as ProGoogleMapsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Maps cookie preset.
 */
class GoogleMapsPreset extends \DevOwl\RealCookieBanner\presets\pro\GoogleMapsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google Maps displays maps on the website as iframe or via JavaScript directly embedded as part of the website. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'isEmbeddingOnlyExternalResources' => \true,
                'technicalHandlingNotice' => \join(' ', [
                    __(
                        'Please use only Google Maps v3 or later to be GDPR compliant. In addition, you must create a content blocker that will block Google Maps until the user gives consent to load it.',
                        RCB_TD
                    ),
                    \sprintf(
                        '<a href="%s" target="_blank">%s</a>',
                        esc_attr(__('https://devowl.io/2021/embed-google-maps-gdpr/', RCB_TD)),
                        \sprintf(
                            // translators:
                            __('Learn more about %s and the GDPR!', RCB_TD),
                            'Google Maps'
                        )
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
