<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ZohoFormsPreset as ProZohoFormsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Zoho Forms cookie preset.
 */
class ZohoFormsPreset extends \DevOwl\RealCookieBanner\presets\pro\ZohoFormsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Zoho Forms is a form system that allows us to add contact, newsletter, survey and other forms to the website. The cookies are used for visitor security by preventing the faking of cross-site requests.',
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
                        'name' => 'zfccn',
                        'host' => 'forms.zohopublic.eu',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
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
