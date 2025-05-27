<?php

namespace DevOwl\RealCookieBanner\lite\presets\blocker;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\blocker\TiWooCommerceWishlistPreset as BlockerTiWooCommerceWishlistPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * TI WooCommerce Wishlist blocker preset.
 */
class TiWooCommerceWishlistPreset extends \DevOwl\RealCookieBanner\presets\pro\blocker\TiWooCommerceWishlistPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => \array_merge(
                [
                    'name' => 'TI WooCommerce Wishlist',
                    'serviceTemplates' => [
                        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TI_WOOCOMMERCE_WISHLIST
                    ],
                    'isVisual' => \false
                ],
                $parent['attributes']
            )
        ]);
    }
}
