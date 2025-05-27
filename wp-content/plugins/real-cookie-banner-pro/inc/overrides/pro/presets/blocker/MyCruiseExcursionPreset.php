<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MyCruiseExcursionPreset as PresetsMyCruiseExcursionPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MyCruiseExcursionPreset as BlockerMyCruiseExcursionPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * My Cruise ExcursionPreset blocker preset.
 */
class MyCruiseExcursionPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MyCruiseExcursionPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'In order to propose you shore excursions from the catalog of My Cruise Excursion, you must allow us to load the catalog of My Cruise Excursion.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MyCruiseExcursionPreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'default',
                    'visualContentType' => 'generic'
                ],
                $parent['attributes']
            )
        ]);
    }
}
