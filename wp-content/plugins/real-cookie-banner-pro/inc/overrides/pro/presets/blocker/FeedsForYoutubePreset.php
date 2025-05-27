<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\FeedsForYoutubePreset as PresetsFeedsForYoutubePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FeedsForYoutubePreset as BlockerFeedsForYoutubePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Feeds for YouTube (YouTube video, channel, and gallery plugin) blocker preset.
 */
class FeedsForYoutubePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FeedsForYoutubePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FeedsForYoutubePreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-video'
                ],
                $parent['attributes']
            )
        ]);
    }
}
