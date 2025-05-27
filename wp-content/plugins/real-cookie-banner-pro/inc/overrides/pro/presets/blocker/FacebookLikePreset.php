<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FacebookLikePreset as PresetsFacebookLikePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookLikePreset as BlockerFacebookLikePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook (Like button) blocker preset.
 */
class FacebookLikePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookLikePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Facebook Like Button',
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FacebookLikePreset::IDENTIFIER]
                ],
                $parent['attributes']
            )
        ]);
    }
}
