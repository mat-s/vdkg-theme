<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\presets\free\YoutubePreset;
use DevOwl\RealCookieBanner\presets\pro\FeedsForYoutubePreset as ProFeedsForYoutubePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Feeds for YouTube (YouTube video, channel, and gallery plugin) preset.
 */
class FeedsForYoutubePreset extends \DevOwl\RealCookieBanner\presets\pro\FeedsForYoutubePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => ['extends' => \DevOwl\RealCookieBanner\presets\free\YoutubePreset::IDENTIFIER]
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
