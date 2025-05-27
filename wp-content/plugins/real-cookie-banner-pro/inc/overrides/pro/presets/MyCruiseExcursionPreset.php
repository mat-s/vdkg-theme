<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MyCruiseExcursionPreset as ProMyCruiseExcursionPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * My Cruise Excursion cookie preset.
 */
class MyCruiseExcursionPreset extends \DevOwl\RealCookieBanner\presets\pro\MyCruiseExcursionPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'My Cruise Excursion allows us to show you shore excursions from the My Cruise Excursion catalog. For example, based on an editorially made preselection or through search forms. No cookies in the technical sense are set on the user\'s client, but technical and personal data such as the IP address are transmitted from the client to the service provider\'s server to enable the use of the service.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'TripUp GmbH',
                'providerPrivacyPolicyUrl' => __(
                    'https://mycruiseexcursion.com/privacy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
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
