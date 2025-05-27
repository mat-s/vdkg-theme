<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\pro\FacebookForWooCommercePreset as PresetsFacebookForWooCommercePreset;
use DevOwl\RealCookieBanner\presets\pro\blocker\FacebookForWooCommercePreset as BlockerFacebookForWooCommercePreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook For WooCommerce preset -> Google Analytics blocker preset..
 */
class FacebookForWooCommercePreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookForWooCommercePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                ['serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\FacebookForWooCommercePreset::IDENTIFIER]],
                $parent['attributes']
            )
        ]);
    }
}
