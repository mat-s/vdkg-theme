<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\FacebookGraphPreset as PresetsFacebookGraphPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookGraphPreset as BlockerFacebookGraphPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Graph blocker preset.
 */
class FacebookGraphPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookGraphPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FacebookGraphPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
