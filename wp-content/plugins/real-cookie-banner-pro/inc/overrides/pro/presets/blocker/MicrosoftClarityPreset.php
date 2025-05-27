<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MicrosoftClarityPreset as PresetsMicrosoftClarityPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MicrosoftClarityPreset as BlockerMicrosoftClarityPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Microsoft Clarity blocker preset.
 */
class MicrosoftClarityPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MicrosoftClarityPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MicrosoftClarityPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
