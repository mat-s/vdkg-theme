<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\ImgurPreset as PresetsImgurPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\ImgurPreset as BlockerImgurPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Imgur blocker preset.
 */
class ImgurPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\ImgurPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\ImgurPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-video'
                ],
                $parent['attributes']
            )
        ]);
    }
}
