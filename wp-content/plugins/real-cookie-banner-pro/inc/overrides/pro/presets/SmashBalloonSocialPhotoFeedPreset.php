<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\pro\SmashBalloonSocialPhotoFeedPreset as ProSmashBalloonSocialPhotoFeedPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Smash Balloon Social Photo Feed preset -> Instagram cookie preset.
 */
class SmashBalloonSocialPhotoFeedPreset extends \DevOwl\RealCookieBanner\presets\pro\SmashBalloonSocialPhotoFeedPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\lite\presets\InstagramPostPreset::IDENTIFIER,
                'technicalHandlingNotice' => null
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
