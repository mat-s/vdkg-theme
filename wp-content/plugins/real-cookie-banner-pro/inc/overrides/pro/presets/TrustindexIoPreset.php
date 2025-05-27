<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TrustindexIoPreset as ProTrustindexIoPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Trustindex.io cookie preset.
 */
class TrustindexIoPreset extends \DevOwl\RealCookieBanner\presets\pro\TrustindexIoPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    "Trustindex.io allows us to display reviews from clients submitted on Google or Facebook. No cookies in the technical sense are set on the user's client device, but technical and personal data such as the IP address are transferred from the client to the server of the service provider to enable the use of the service.",
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Trustindex.io',
                'providerPrivacyPolicyUrl' => 'https://www.trustindex.io/terms-and-conditions-and-privacy-policy/',
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
