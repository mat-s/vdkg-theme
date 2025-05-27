<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\UserlikePreset as PresetsUserlikePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\UserlikePreset as BlockerUserlikePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Userlike blocker preset.
 */
class UserlikePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\UserlikePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\UserlikePreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
