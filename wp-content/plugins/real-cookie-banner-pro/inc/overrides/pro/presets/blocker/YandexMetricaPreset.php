<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\YandexMetricaPreset as PresetsYandexMetricaPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\YandexMetricaPreset as BlockerYandexMetricaPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Yandex Metrica blocker preset.
 */
class YandexMetricaPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\YandexMetricaPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\YandexMetricaPreset::IDENTIFIER],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
