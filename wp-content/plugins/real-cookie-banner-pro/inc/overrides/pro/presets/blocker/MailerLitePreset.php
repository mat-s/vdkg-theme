<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MailerLitePreset as PresetsMailerLitePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MailerLitePreset as BlockerMailerLitePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * MailerLite blocker preset.
 */
class MailerLitePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MailerLitePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'The email newsletter subscription form is blocked because you have not allowed our email marketing provider MailerLite to load.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\MailerLitePreset::IDENTIFIER],
                    'isVisual' => \true,
                    'visualType' => 'default',
                    'visualContentType' => 'generic'
                ],
                $parent['attributes']
            )
        ]);
    }
}
