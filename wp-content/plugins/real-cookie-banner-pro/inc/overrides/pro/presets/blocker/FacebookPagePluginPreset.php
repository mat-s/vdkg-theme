<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\FacebookPagePluginPreset as PresetsFacebookPagePluginPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPagePluginPreset as BlockerFacebookPagePluginPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Page Plugin blocker preset.
 */
class FacebookPagePluginPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPagePluginPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'Information about a Facebook Page has been blocked because you did not allow to load it.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FacebookPagePluginPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'hero',
                    'visualContentType' => 'feed-text'
                ],
                $parent['attributes']
            )
        ]);
    }
}
