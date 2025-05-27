<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FacebookPostPreset as PresetsFacebookPostPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPostPreset as BlockerFacebookPostPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook (Post) blocker preset.
 */
class FacebookPostPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPostPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Facebook (embedded post)',
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FacebookPostPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-text'
                ],
                $parent['attributes']
            )
        ]);
    }
}
