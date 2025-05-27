<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\SendinbluePreset as ProSendinbluePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Sendinblue cookie preset.
 */
class SendinbluePreset extends \DevOwl\RealCookieBanner\presets\pro\SendinbluePreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Sendinblue is a marketing platform that allows us to differentiate audiences and send marketing messages via email. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Sendinblue GmbH',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.sendinblue.com/legal/privacypolicy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'isEmbeddingOnlyExternalResources' => \true,
                'technicalHandlingNotice' => \sprintf(
                    // translators:
                    __(
                        'What do you have to consider when integrating %1$s into your website? <a href="%2$s" target="_blank">Learn more about it in our blog!</a>',
                        RCB_TD
                    ),
                    $parent['name'],
                    esc_attr(__('https://devowl.io/2022/sendinblue-integration-wordpress/', RCB_TD))
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
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
