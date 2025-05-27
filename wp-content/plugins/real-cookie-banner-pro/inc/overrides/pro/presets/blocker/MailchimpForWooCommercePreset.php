<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\MailchimpForWooCommercePreset as PresetsMailchimpForWooCommercePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\MailchimpForWooCommercePreset as BlockerMailchimpForWooCommercePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Mailchimp for WooCommerce blocker preset.
 */
class MailchimpForWooCommercePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\MailchimpForWooCommercePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'Mailchimp',
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\pro\MailchimpForWooCommercePreset::IDENTIFIER
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
