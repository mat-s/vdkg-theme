<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\AdInserterPreset as PresetsAdInserterPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\AdInserterPreset as BlockerAdInserterPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Ad Inserter plugin blocker preset.
 */
class AdInserterPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\AdInserterPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\AdInserterPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
