<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\SmashBalloonSocialPhotoFeedPreset as PresetsSmashBalloonSocialPhotoFeedPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\SmashBalloonSocialPhotoFeedPreset as BlockerSmashBalloonSocialPhotoFeedPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Smash Balloon Social Photo Feed preset -> Instagram blocker preset.
 */
class SmashBalloonSocialPhotoFeedPreset extends
    \DevOwl\RealCookieBanner\presets\pro\blocker\SmashBalloonSocialPhotoFeedPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Smash Balloon Social Photo Feed (Instagram Feed)',
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\SmashBalloonSocialPhotoFeedPreset::IDENTIFIER,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FONTAWESOME
                    ],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-video'
                ],
                $parent['attributes']
            )
        ]);
    }
}
