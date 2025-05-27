<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\AddToAnyPreset as ProAddToAnyPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * AddToAny Share Buttons cookie preset.
 */
class AddToAnyPreset extends \DevOwl\RealCookieBanner\presets\pro\AddToAnyPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'AddToAny allows providing links and buttons for sharing content on a variety of social networks and other communication tools on the internet. The cookies are used to uniquely identify the user and classify him or her as a potential attacker and to determine the fastest available server.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'AddToAny',
                'providerPrivacyPolicyUrl' => 'https://www.addtoany.com/privacy',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '__cfduid',
                        'host' => '.addtoany.com',
                        'duration' => 13,
                        'durationUnit' => 'mo',
                        'isSessionDuration' => \false
                    ]
                ],
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'This template assumes that you use the <a href="%s" target="_blank">AddToAny WordPress plugin</a>. The template is not suitable to add Facebook Like, Twitter Tweet or Pinterest Pin button in AddToAny. If you want to use any of these buttons, please use it without AddToAny and additionally create the cookies and content blockers for the respective service.',
                        RCB_TD
                    ),
                    __('https://wordpress.org/plugins/add-to-any/', RCB_TD)
                ),
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
