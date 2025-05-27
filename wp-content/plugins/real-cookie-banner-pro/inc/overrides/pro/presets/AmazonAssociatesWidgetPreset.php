<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AmazonAssociatesWidgetPreset as ProAmazonAssociatesWidgetPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Hotjar cookie preset.
 */
class AmazonAssociatesWidgetPreset extends \DevOwl\RealCookieBanner\presets\pro\AmazonAssociatesWidgetPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => 'Amazon Associates (Widget)',
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Amazon Associates offers widgets that show relevant articles that users can buy on Amazon or search for articles on Amazon. The cookies are used to collect statistics of user behavior, link data from registered users on the Amazon website to their account and to display personalized recommendations for each individual user.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' =>
                    'Amazon Europe Core SARL, Amazon EU SARL, Amazon Services Europe SARL and Amazon Media EU SARL',
                'providerPrivacyPolicyUrl' => 'https://www.amazon.co.uk/gp/help/customer/display.html/?nodeId=502584',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'ad-id',
                        'host' => '.amazon-adsystem.com',
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 9
                    ],
                    [
                        'type' => 'http',
                        'name' => 'ad-privacy',
                        'host' => '.amazon-adsystem.com',
                        'duration' => 64,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    '%s<ol><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ol>',
                    __(
                        'The following opt-in code is only an example and is therefore disabled (HTML comment). Please follow these steps to correctly add ONE Amazon Associates widget on your website:',
                        RCB_TD
                    ),
                    __(
                        'Go to Amazon Associates > Widgets and create your own custom widget code (similar to them below).',
                        RCB_TD
                    ),
                    __('Enter the widget code in the "Code executed on opt-in" field of this cookie.', RCB_TD),
                    __(
                        'Define an unique ID for the HTML element where the Amazon Associates Widget will be placed in the field "Amazon widget HTML ID" (e. g. <code>amzn-widget</code>).',
                        RCB_TD
                    ),
                    __(
                        'Insert an empty div element with the defined HTML ID somewhere in your website, where the widget should appear after user consent (e. g. <code>&lt;div id="amzn-widget">&lt;/div></code> in the sidebar of your blog).',
                        RCB_TD
                    )
                ),
                'dynamicFields' => [
                    [
                        'name' => 'amznAssoWidgetHtmlId',
                        'label' => __('Amazon Associates Widget HTML ID', RCB_TD),
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => 'amzn-widget'
                    ]
                ],
                'codeOptIn' =>
                    '<!-- ' .
                    __('Do NOT REMOVE this line!', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED) .
                    ' ({{amznAssoWidgetHtmlId}})  -->
<!--
' .
                    __(
                        'This is just an example. Replace it with your script!',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ) .
                    '<script type="text/javascript">amzn_assoc_ad_type ="responsive_search_widget"; amzn_assoc_tracking_id ="my-id-21"; amzn_assoc_marketplace ="amazon"; amzn_assoc_region ="DE"; amzn_assoc_placement =""; amzn_assoc_search_type = "search_widget";amzn_assoc_width ="250"; amzn_assoc_height ="250"; amzn_assoc_default_search_category =""; amzn_assoc_default_search_key ="ABC";amzn_assoc_theme ="light"; amzn_assoc_bg_color ="FFFFFF"; </script><script src="//z-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&Marketplace=DE"></script>
-->',
                'deleteTechnicalDefinitionsAfterOptOut' => \false,
                'ePrivacyUSA' => \true
            ]
        ]);
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
