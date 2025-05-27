<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\CalendlyPreset as PresetsCalendlyPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\CalendlyPreset as BlockerCalendlyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Calendly blocker preset.
 */
class CalendlyPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\CalendlyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'In order to book appointments with us, you must allow us to load the Calendly appointment scheduling tool.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\CalendlyPreset::IDENTIFIER,
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_RECAPTCHA
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
