<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\GoogleUserContentPreset as PresetsGoogleUserContentPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\GoogleUserContentPreset as BlockerGoogleUserContentPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google User Content blocker preset.
 */
class GoogleUserContentPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleUserContentPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleUserContentPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
