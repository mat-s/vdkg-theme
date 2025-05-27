<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\OpenStreetMapPreset as ProOpenStreetMapPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * OpenStreetMap cookie preset.
 */
class OpenStreetMapPreset extends \DevOwl\RealCookieBanner\presets\pro\OpenStreetMapPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'OpenStreetMap displays maps on the website embedded as part of the website. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'OpenStreetMap Foundation (OSMF)',
                'providerPrivacyPolicyUrl' => 'https://wiki.osmfoundation.org/wiki/Privacy_Policy',
                'isEmbeddingOnlyExternalResources' => \true,
                'technicalHandlingNotice' => __(
                    'This service template is for iframe embeddings of openstreetmap.org. Third party interfaces like OpenLayers are not covered by this template.',
                    RCB_TD
                )
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
