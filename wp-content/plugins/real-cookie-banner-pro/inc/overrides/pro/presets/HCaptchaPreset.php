<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\HCaptchaPreset as ProHCaptchaPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * hCaptcha cookie preset.
 */
class HCaptchaPreset extends \DevOwl\RealCookieBanner\presets\pro\HCaptchaPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Essential', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'hCaptcha is a solution for detecting bots, e. g. when entering data into online forms, and preventing spam. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Intuition Machines, Inc.',
                'providerPrivacyPolicyUrl' => 'https://www.hcaptcha.com/privacy',
                'isEmbeddingOnlyExternalResources' => \true
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
