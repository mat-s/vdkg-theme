<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ProvenExpertWidgetPreset as ProProvenExpertWidgetPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Proven Expert Widget preset.
 */
class ProvenExpertWidgetPreset extends \DevOwl\RealCookieBanner\presets\pro\ProvenExpertWidgetPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Proven Expert is a platform for customer reviews. The Proven Expert widget shows how the provider of this website has been rated by customers on Proven Expert. No cookies in the technical sense are set on the client device of the user, but technical and personal data such as the IP address are transferred from the client to the server of the service provider to enable the use of the service.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Expert Systems AG',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.provenexpert.com/en-us/privacy-policy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'isEmbeddingOnlyExternalResources' => \true,
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
