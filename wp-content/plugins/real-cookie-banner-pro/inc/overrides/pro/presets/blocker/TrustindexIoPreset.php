<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\TrustindexIoPreset as PresetsTrustindexIoPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\TrustindexIoPreset as BlockerTrustindexIoPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Trustindex.io blocker preset.
 */
class TrustindexIoPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\TrustindexIoPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'In order to display up-to-date customer reviews from Google, Facebook, etc., we use the aggregator Trustindex.io. To see customer reviews, you must allow us to load Trustindex.io.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\TrustindexIoPreset::IDENTIFIER,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_GRAPH,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_USER_CONTENT
                    ],
                    'isVisual' => \true,
                    'visualType' => 'default',
                    'visualContentType' => 'generic'
                ],
                $parent['attributes']
            )
        ]);
    }
}
