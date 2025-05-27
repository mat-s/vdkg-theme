<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\blocker\ZohoBookingsPreset as BlockerZohoBookingsPreset;
use DevOwl\RealCookieBanner\presets\pro\ZohoBookingsPreset as ProZohoBookingsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Zoho Bookings blocker preset.
 */
class ZohoBookingsPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\ZohoBookingsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => $parent['name'],
                    'description' => __(
                        'We use Zoho Bookings to enable you to book appointments online on our website. In order to use the form, you must allow this service to load.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\ZohoBookingsPreset::IDENTIFIER]
                ],
                $parent['attributes']
            )
        ]);
    }
}
