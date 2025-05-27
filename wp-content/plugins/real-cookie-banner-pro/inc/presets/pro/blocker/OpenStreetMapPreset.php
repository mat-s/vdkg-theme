<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\OpenStreetMapPreset as PresetsOpenStreetMapPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * OpenStreetMap blocker preset.
 */
class OpenStreetMapPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\OpenStreetMapPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'OpenStreetMap';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'attributes' => [
                'rules' => [
                    '*openstreetmap.org/export/embed*',
                    '*tile.openstreetmap.org*',
                    // [Plugin Comp] https://de.wordpress.org/plugins/leaflet-map/ and Thrive Events (https://github.com/Leaflet/Leaflet/)
                    'div[class*="leaflet-map"]',
                    '*leaflet.js*',
                    '*leaflet.min*',
                    '*leaflet.css*',
                    '*wp-content/plugins/leaflet-map*',
                    'window.WPLeafletMapPlugin.push',
                    'window.WPLeafletMapPlugin.maps',
                    // [Plugin Comp] https://wordpress.org/plugins/extensions-leaflet-map/
                    '*/wp-content/plugins/extensions-leaflet-map/*',
                    // [Plugin Comp] https://de.wordpress.org/plugins/ultimate-maps-by-supsystic/
                    'div[class*="ums_map_opts"]',
                    // [Plugin Comp] https://wordpress.org/plugins/osm/
                    '*/wp-content/plugins/osm/js/*',
                    'div[id^="map_ol3js_"]',
                    'target: "map_ol3js_',
                    // [Plugin Comp] https://wordpress.org/plugins/wp-map-block/
                    '*wp-content/plugins/wp-map-block*',
                    'div[class*="wpmapblockrender"]',
                    // [Plugin Comp] Salient theme
                    '*nectar-leaflet-map*.js*',
                    // [Plugin Comp] Impreza WP Bakery
                    'div[class*="w-map provider_osm"]',
                    // [Plugin Comp] OSMapper
                    'div[class*="ba_map_holder"]',
                    '*/wp-content/plugins/osmapper/assets/js/*',
                    // [Plugin Comp] https://wordpress.org/plugins/osm-map-elementor/
                    'div[class*="elementor-widget-osm-map-elementor"]',
                    '*/wp-content/plugins/osm-map-elementor/assets/*'
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/openstreetmap.png')
        ];
    }
}
