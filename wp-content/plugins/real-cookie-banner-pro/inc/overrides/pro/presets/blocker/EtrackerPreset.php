<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EtrackerPreset as PresetsEtrackerPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\EtrackerPreset as BlockerEtrackerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * etracker blocker preset.
 */
class EtrackerPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\EtrackerPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => __(
                        'etracker: Tracking without consent',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\EtrackerPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
