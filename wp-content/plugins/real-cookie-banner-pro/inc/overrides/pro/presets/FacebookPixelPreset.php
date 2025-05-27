<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\FacebookPixelPreset as ProFacebookPixelPreset;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Pixel cookie preset.
 */
class FacebookPixelPreset extends \DevOwl\RealCookieBanner\presets\pro\FacebookPixelPreset {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = ['facebook-for-woocommerce'];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        return \array_merge($parent, [
            'blockerPresetIds' => [
                self::IDENTIFIER,
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_FOR_WOOCOMMERCE
            ],
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Facebook Pixel helps to determine whether you are the target audience for presenting ads within the Facebook advertising network. The Facebook Pixel also allows to track the effectiveness of Facebook Ads. With the additional "extended comparison" feature, information stored in your Facebook account, such as email addresses or Facebook IDs of users, is used in encrypted form to target audiences. Cookies are used to differentiate users and to record their behavior on the website in detail and to link this data with advertising data from the Facebook advertising network. This data can be linked to the data of users registered on facebook.com with their Facebook accounts. Your behavior may also be tracked via server-to-server communication, for example, if you purchase a product from the online store, our server may report back to Facebook which ad you clicked on to start the purchase process.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Meta Platforms Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://www.facebook.com/about/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_fbp',
                        'host' => $cookieHost,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false,
                        'duration' => 3
                    ],
                    [
                        'type' => 'http',
                        'name' => 'fr',
                        'host' => '.facebook.com',
                        'duration' => 3,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'presence',
                        'host' => '.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'wd',
                        'host' => '.facebook.com',
                        'duration' => 7,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'spin',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'xs',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'c_user',
                        'host' => '.facebook.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'sb',
                        'host' => '.facebook.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'act',
                        'host' => '.facebook.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'datr',
                        'host' => '.facebook.com',
                        'duration' => 2,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'fbPixelId',
                        'label' => __('Facebook Pixel ID', RCB_TD),
                        'expression' => '^\\d{5,}$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => '123456789123456'
                    ]
                ],
                'codeOptIn' => \sprintf(
                    '<script %1$s="%2$s">
    !(function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = "2.0";
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s);
    })(window, document, "script", "https://connect.facebook.net/%3$s/fbevents.js");
    fbq("init", "{{fbPixelId}}");
    fbq("track", "PageView");
</script>
<noscript %1$s="%2$s"><img height="1" width="1" alt="" style="display: none;" src="https://www.facebook.com/tr?id={{fbPixelId}}&ev=PageView&noscript=1" /></noscript>',
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_SKIP_IF_ACTIVE,
                    \join(',', self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS),
                    $this->getScriptLocale()
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'shouldUncheckContentBlockerCheckboxWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS
                ),
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'What do you have to consider when integrating %1$s into your website? <a href="%2$s" target="_blank">Learn more about it in our blog!</a>',
                        RCB_TD
                    ),
                    $parent['name'],
                    esc_attr(__('https://devowl.io/2022/facebook-pixel-wordpress-gdpr/', RCB_TD))
                )
            ]
        ]);
    }
    /**
     * Facebook Pixel needs to be requested with an language code.
     */
    protected function getScriptLocale() {
        $default = 'en_US';
        $websiteLocale = get_locale();
        if (\DevOwl\RealCookieBanner\Utils::startsWith($websiteLocale, 'de_DE')) {
            return 'de_DE';
        } elseif (\DevOwl\RealCookieBanner\Utils::startsWith($websiteLocale, 'en_')) {
            return 'en_US';
        } else {
            return $default;
        }
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'fbpx-opt-in',
                'tagManagerOptOutEventName' => 'fbpx-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'fbpx-opt-in',
                'tagManagerOptOutEventName' => 'fbpx-opt-out'
            ]
        ];
    }
}
