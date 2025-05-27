<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\lite\presets\FacebookSharePreset as PresetsFacebookSharePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookSharePreset as BlockerFacebookSharePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook (share button) blocker preset.
 */
class FacebookSharePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookSharePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Facebook Share Button',
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\lite\presets\FacebookSharePreset::IDENTIFIER]
                ],
                $parent['attributes']
            )
        ]);
    }
}
