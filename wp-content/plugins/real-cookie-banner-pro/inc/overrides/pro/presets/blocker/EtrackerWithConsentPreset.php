<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\blocker\EtrackerWithConsentPreset as BlockerEtrackerWithConsentPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * etracker blocker preset.
 */
class EtrackerWithConsentPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\EtrackerWithConsentPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => __(
                        'etracker: Tracking with consent',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ETRACKER_WITH_CONSENT],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
