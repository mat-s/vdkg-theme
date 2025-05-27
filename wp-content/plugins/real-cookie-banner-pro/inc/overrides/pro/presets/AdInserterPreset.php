<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AdInserterPreset as ProAdInserterPreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Ad Inserter plugin cookie preset.
 */
class AdInserterPreset extends \DevOwl\RealCookieBanner\presets\pro\AdInserterPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Ad Inserter allows us to manage and target advertising based on the content of the website. Cookies are used to detect adblockers, to count the number of page views with an adblocker and to remember whether the user has already been redirected to a subpage that prompts him to switch off his adblocker. In addition, a cookie can be used to remember how often which advertising placement has already been displayed and how often the respective advertisement has been clicked on.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => get_bloginfo('name'),
                'providerPrivacyPolicyUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getPrivacyPolicyUrl(
                    ''
                ),
                'providerLegalNoticeUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getImprintPageUrl(
                    ''
                ),
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'aiADB',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'aiADB_PV',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'aiADB_PR',
                        'host' => $cookieHost,
                        'duration' => 30,
                        'durationUnit' => 'd',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'http',
                        'name' => 'aiBLOCKS',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \join('<br /><br />', [
                    // translators:
                    \sprintf(
                        // translators:
                        __(
                            'Ad Insert plays out ads even without consent. You should <a href="%s" target="_blank">obtain consent for the ads via the TCF v2.0 or newer standard</a>. Only some features of the plugin require you to obtain consent for Ad Inserter.',
                            RCB_TD
                        ),
                        __('https://adinserter.pro/faq/gdpr-compliance-cookies-consent', RCB_TD)
                    ),
                    __(
                        'Only if the ad blocker detection is enabled, the cookies <code>aiADB</code>, <code>aiADB_PV</code> and <code>aiADB_PR</code> are set. The cookie duration depends on the settings of the feature. Please make sure that you have disabled the "Use external scripts" checkbox, as this part of the adblocker transmits data to Google and Media.net before you have consent to do so.',
                        RCB_TD
                    ),
                    \sprintf(
                        // translators:
                        __(
                            'The cookie <code>aiBLOCKS</code> is set when you use the <a href="%s" target="_blank">impression and click limits</a> feature of Ad Inserter Pro. The duration of the cookie depends on the settings of the feature.',
                            RCB_TD
                        ),
                        __('https://adinserter.pro/documentation/ad-impression-and-click-limiting', RCB_TD)
                    ),
                    __(
                        'Please remove the cookies in the "Technical Cookie Information" section that do not apply to your case. If you do not use any of these features, we assume that you do not need to obtain consent.',
                        RCB_TD
                    )
                ]),
                'deleteTechnicalDefinitionsAfterOptOut' => \true
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
