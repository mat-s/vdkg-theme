<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\pro\PiwikProPreset as ProPiwikProPreset;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\Banner;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Piwik PRO cookie preset.
 */
class PiwikProPreset extends \DevOwl\RealCookieBanner\presets\pro\PiwikProPreset {
    const POTENTIAL_SKIP_IF_ACTIVE_PLUGINS = [\DevOwl\RealCookieBanner\presets\pro\PiwikProPreset::SLUG];
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Statistics', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Piwik is a service for creating detailed statistics about user behavior on the website. This includes the pages viewed, technical and geographic data of the requesting device, the time spent on a page and the click behavior on the Website. The collected data is mostly used in aggregated form for analyses of the website, e.g. to improve it. Cookies are used to distinguish users and link data from multiple page views. Also, the user is assigned to a session to recognize different independent visits. The last interaction of the visitor with the website and the website from which the visitor can be stored. In addition, traffic source prioritization is performed and returning visitors are flagged as such.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Piwik PRO SA, Piwik PRO GmbH, Piwik PRO LLC',
                'providerPrivacyPolicyUrl' => __(
                    'https://piwik.pro/privacy-policy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_pk_ses.*',
                        'host' => $cookieHost,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false,
                        'duration' => 30
                    ],
                    [
                        'type' => 'http',
                        'name' => '_pk_id.*',
                        'host' => $cookieHost,
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'stg_last_interaction',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'stg_externalReferrer',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ],
                    [
                        'type' => 'http',
                        'name' => 'stg_traffic_source_priority',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'stg_returning_visitor',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'piwikContainerAddress',
                        'label' => __('Piwik container address (URL)', RCB_TD),
                        'expression' => '^http[s]?:\\/\\/.*[^\\/]$',
                        'invalidMessage' => __('Please fill in a valid container address!', RCB_TD),
                        'example' => 'https://yourname.containers.piwik.pro',
                        'hint' => \join('<br /><br />', [
                            \sprintf(
                                // translators:
                                __(
                                    'You can find your Piwik container address in your Piwik PRO dashboard (e.g. at devowl.piwik.pro) by going to <i>Sites & apps > [your domain]</i>. Afterwards, open the tab "Installation" and there you need to extract the URL from the script (<a href="%s" target="_blank">see example</a>)',
                                    RCB_TD
                                ),
                                __(
                                    'https://assets.devowl.io/in-app/wp-real-cookie-banner/services/piwik-container-address.png',
                                    RCB_TD
                                )
                            ),
                            __(
                                'Example standard URL: <code>https://yourname.containers.piwik.pro</code>.<br/>Example custom domain URL: <code>https://yourname.piwik.pro/containers</code>.',
                                RCB_TD
                            ),
                            \sprintf(
                                // translators:
                                __(
                                    'This address may be different for Piwik PRO on-premises or private cloud accounts. Please <a href="%s" target="_blank">contact Piwik PRO</a> to get the right address.',
                                    RCB_TD
                                ),
                                __('https://piwik.pro/contact/', RCB_TD)
                            )
                        ])
                    ],
                    [
                        'name' => 'piwikProSiteId',
                        'label' => __('Piwik PRO Site ID', RCB_TD),
                        'expression' =>
                            '^[A-Za-z0-9]{8,8}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{4,4}-[A-Za-z0-9]{12,12}$',
                        'invalidMessage' => __('Please fill in a valid ID!', RCB_TD),
                        'example' => '3f5e37d4-14a8-4b9c-8672-0132bf15372f',
                        'hint' => \join('<br /><br />', [
                            __(
                                'You can find your Piwik PRO Site ID in your Piwik PRO dashboard (e.g. at devowl.piwik.pro) by going to <i>Sites & apps > [your domain]</i>. In the dialog that opens, you will find your ID directly under your domain name.',
                                RCB_TD
                            ),
                            __(
                                'In the same dialog, in the "Privacy" tab, please disable the "Ask visitors for consent” option. You already obtain the necessary consent for the use of Piwik PRO via Real Cookie Banner.',
                                RCB_TD
                            )
                        ])
                    ]
                ],
                'codeOptIn' => \sprintf(
                    '<script %1$s="%2$s">
(function(window, document, dataLayerName, id) {
window[dataLayerName]=window[dataLayerName]||[],window[dataLayerName].push({start:(new Date).getTime(),event:"stg.start"});var scripts=document.getElementsByTagName(\'script\')[0],tags=document.createElement(\'script\');
function stgCreateCookie(a,b,c){var d="";if(c){var e=new Date;e.setTime(e.getTime()+24*c*60*60*1e3),d="; expires="+e.toUTCString()}document.cookie=a+"="+b+d+"; path=/"}
var isStgDebug=(window.location.href.match("stg_debug")||document.cookie.match("stg_debug"))&&!window.location.href.match("stg_disable_debug");stgCreateCookie("stg_debug",isStgDebug?1:"",isStgDebug?14:-1);
var qP=[];dataLayerName!=="dataLayer"&&qP.push("data_layer_name="+dataLayerName),isStgDebug&&qP.push("stg_debug");var qPString=qP.length>0?("?"+qP.join("&")):"";
tags.async=!0,tags.src="{{piwikContainerAddress}}/"+id+".js"+qPString,scripts.parentNode.insertBefore(tags,scripts);
!function(a,n,i){a[n]=a[n]||{};for(var c=0;c<i.length;c++)!function(i){a[n][i]=a[n][i]||{},a[n][i].api=a[n][i].api||function(){var a=[].slice.call(arguments,0);"string"==typeof a[0]&&window[dataLayerName].push({event:n+"."+i+":"+a[0],parameters:[].slice.call(arguments,1)})}}(i[c])}(window,"ppms",["tm","cm"]);
})(window, document, \'dataLayer\', \'{{piwikProSiteId}}\');
</script>
<noscript><iframe %1$s="%2$s" src="{{piwikContainerAddress}}/{{piwikProSiteId}}/noscript.html" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>',
                    \DevOwl\RealCookieBanner\view\Banner::HTML_ATTRIBUTE_SKIP_IF_ACTIVE,
                    \join(',', self::POTENTIAL_SKIP_IF_ACTIVE_PLUGINS)
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __(
                        'You should also for more privacy in the Piwik PRO dashboard (e.g. owlreview.piwik.pro) under <i>Settings > Global site & app settings > Privacy > IP addresses</i> enable the option "Mask IP addresses" and activate at least "Level 1" so that the IP addresses of your visitors are stored anonymously.',
                        RCB_TD
                    ),
                    __(
                        'This template assumes that you are using the statistics feature of Piwik PRO. Using the integrated tag manager is not expected.',
                        RCB_TD
                    )
                ]),
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
                'tagManagerOptInEventName' => 'piwik-opt-in',
                'tagManagerOptOutEventName' => 'piwik-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'piwik-opt-in',
                'tagManagerOptOutEventName' => 'piwik-opt-out'
            ]
        ];
    }
}
