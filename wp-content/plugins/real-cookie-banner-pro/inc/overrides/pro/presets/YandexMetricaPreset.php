<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\pro\YandexMetricaPreset as ProYandexMetricaPreset;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Yandex Metrica cookie preset.
 */
class YandexMetricaPreset extends \DevOwl\RealCookieBanner\presets\pro\YandexMetricaPreset {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = [
        // Free plugins
        'yandex-metrica'
    ];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(
            \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
        );
        $cookieHostCurrent = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Yandex Metrica is a service for creating detailed statistics of user behavior on the website. The cookies are used to differentiate users, store campaign related information for and from the user and to link data from multiple page views. This data may be linked to data about users who have signed in to their Yandex account on yandex.com or a localised version of Yandex. In some cases, the collected data can also be used for ad targeting in the Yandex Advertising Network.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'YANDEX LLC',
                'providerPrivacyPolicyUrl' => 'https://metrica.yandex.com/about/info/privacy-policy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'ymex',
                        'host' => '.yandex.ru',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ],
                    [
                        'type' => 'http',
                        'name' => 'i',
                        'host' => '.yandex.ru',
                        'duration' => 10,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'yandexuid',
                        'host' => '.yandex.ru',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'yabs-sid',
                        'host' => 'mc.yandex.ru',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => '_ym_uid',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_ym_isad',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => '_ym_d',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'yuidss',
                        'host' => '.yandex.ru',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => '_ym*_reqNum',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_ym*_il',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_ym_uid',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_ym*_lastHit',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_ym*_lsid',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '_ym_retryReqs',
                        'host' => $cookieHostCurrent,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'technicalHandlingNotice' => __(
                    'If you already embed Yandex Metrica into your website via a plugin, please remove the following opt-in code and create a content blocker for this service instead.',
                    RCB_TD
                ),
                'dynamicFields' => [
                    [
                        'name' => 'yandexMetricaTagId',
                        'label' => __('Yandex Metrica Tag ID', RCB_TD),
                        'expression' => '^\\d+$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '376341751',
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You find your Yandex Metrica Tag ID in the <a href="%s" target="_blank">Yandex Metrica Tags list</a>.',
                                RCB_TD
                            ),
                            __('https://metrica.yandex.com/list/', RCB_TD)
                        )
                    ]
                ],
                'codeOptIn' => \sprintf(
                    '<script %1$s="%2$s">
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym({{yandexMetricaTagId}}, "init", {
     clickmap:true,
     trackLinks:true,
     accurateTrackBounce:true
});
</script>
<noscript %1$s="%2$s"><div><img src="https://mc.yandex.ru/watch/{{yandexMetricaTagId}}" style="position:absolute; left:-9999px;" alt="" /></div></noscript>',
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_SKIP_IF_ACTIVE,
                    \join(',', self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS)
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'shouldUncheckContentBlockerCheckboxWhenOneOf' => \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs(
                    self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS
                )
            ]
        ]);
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
                'tagManagerOptInEventName' => 'yandex-metrica-opt-in',
                'tagManagerOptOutEventName' => 'yandex-metrica-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'yandex-metrica-opt-in',
                'tagManagerOptOutEventName' => 'yandex-metrica-opt-out'
            ]
        ];
    }
}
