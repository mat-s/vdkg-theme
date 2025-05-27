<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TwitterTweetPreset as PresetsTwitterTweetPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\TwitterTweetPreset as BlockerTwitterTweetPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Twitter (tweet) blocker preset.
 */
class TwitterTweetPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\TwitterTweetPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Twitter (embedded tweet)',
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\TwitterTweetPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-text'
                ],
                $parent['attributes']
            )
        ]);
    }
}
