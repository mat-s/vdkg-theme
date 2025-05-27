<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MailPoetPreset as ProMailPoetPreset;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * MailPoet cookie preset.
 */
class MailPoetPreset extends \DevOwl\RealCookieBanner\presets\pro\MailPoetPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'MailPoet is a marketing platform that allows us to differentiate audiences and send marketing messages via email. Cookies are used to remember which prompts to subscribe to the e.g. newsletter have been displayed and closed.',
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
                        'name' => 'popup_form_dismissed',
                        'host' => $cookieHost,
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \join('<br /><br />', [
                    __('This template is only valid for MailPoet 3 or newer.', RCB_TD),
                    __(
                        'You need the service template only if you use a form to subscribe to the newsletter that can be hidden (e.g. popup). Only in this case a cookie is set.',
                        RCB_TD
                    ),
                    \sprintf(
                        // translators:
                        __(
                            'Personal data will never be transferred directly from the browser of your visitors to MailPoet, but only, for example, when you sign up for the newsletter via your WordPress installation. You should always follow the <a href="%s" target="_blank">MailPoet Guide to Conform to GDPR</a>.',
                            RCB_TD
                        ),
                        __('https://kb.mailpoet.com/article/246-guide-to-conform-to-gdpr', RCB_TD)
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
