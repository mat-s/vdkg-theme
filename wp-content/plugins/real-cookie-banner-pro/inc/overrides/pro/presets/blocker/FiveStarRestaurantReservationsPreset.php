<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GoogleRecaptchaPreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FiveStarRestaurantReservationsPreset as BlockerFiveStarRestaurantReservationsPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Five Star Restaurant Reservations Forms with Google reCAPTCHA blocker preset.
 */
class FiveStarRestaurantReservationsPreset extends
    \DevOwl\RealCookieBanner\presets\pro\blocker\FiveStarRestaurantReservationsPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => __(
                        'Restaurant Reservations with Google reCAPTCHA',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    'description' => \sprintf(
                        // translators:
                        __(
                            'We use Google reCAPTCHA to protect our forms from spam. You must accept to load Google reCAPTCHA to send us a message via the form. Alternatively, you can email us from your own email client to %s.',
                            \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                        ),
                        $this->getAdminEmailLink()
                    ),
                    'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\GoogleRecaptchaPreset::IDENTIFIER]
                ],
                $parent['attributes']
            )
        ]);
    }
}
