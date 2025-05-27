<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MtmPreset as ProMtmPreset;
use DevOwl\RealCookieBanner\settings\General;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Matomo Tag Manager cookie preset.
 */
class MtmPreset extends \DevOwl\RealCookieBanner\presets\pro\MtmPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $isDisabled =
            \DevOwl\RealCookieBanner\settings\General::getInstance()->getSetCookiesViaManager() !== 'matomoTagManager';
        return \array_merge($parent, [
            'disabled' => $isDisabled,
            'tags' => $isDisabled
                ? [
                    __('Disabled', RCB_TD) => \sprintf(
                        // translators:
                        __('Please activate %s in settings to use this template.', RCB_TD),
                        __('Matomo Tag Manager', RCB_TD)
                    )
                ]
                : [],
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Matomo Tag Manager is a service for managing tags triggered by a specific event that injects a third script or sends data to a third service. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => get_bloginfo('name'),
                'providerPrivacyPolicyUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getPrivacyPolicyUrl(
                    ''
                ),
                'providerLegalNoticeUrl' => \DevOwl\RealCookieBanner\settings\General::getInstance()->getImprintPageUrl(
                    ''
                ),
                'isEmbeddingOnlyExternalResources' => \true,
                'dynamicFields' => [
                    [
                        'name' => 'mtmUrl',
                        'label' => __('Matomo Tag Manager container script URL', RCB_TD),
                        'expression' =>
                            '^(?:(?:https?|ftp):\\/\\/)?(?:(?!(?:10|127)(?:\\.\\d{1,3}){3})(?!(?:169\\.254|192\\.168)(?:\\.\\d{1,3}){2})(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))|(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*(?:\\.(?:[a-z\\u00a1-\\uffff]{2,})))(?::\\d{2,5})?(?:\\/\\S*)?$',
                        'invalidMessage' => __('Please provide a valid URL!', RCB_TD),
                        'hint' => \sprintf(
                            // translators:
                            __(
                                'You can find your Matomo Tag Manager container script URL in your Matomo Admin dashboard by going to <i>Tag Manager</i>. Afterwards, select your container and click on "Install Code" and there you need to extract the URL from the script (<a href="%s" target="_blank">see example</a>)',
                                RCB_TD
                            ),
                            __(
                                'https://assets.devowl.io/in-app/wp-real-cookie-banner/services/mtm-container-script-url.png',
                                RCB_TD
                            )
                        ),
                        'example' => 'https://matomo.example.com/js/container_wLyN1yv2.js'
                    ]
                ],
                'codeOptIn' => '<script>
    var _mtm = _mtm || [];
    _mtm.push({ "mtm.startTime": new Date().getTime(), event: "mtm.Start" });
    var d = document,
        g = d.createElement("script"),
        s = d.getElementsByTagName("script")[0];
    g.type = "text/javascript";
    g.async = true;
    g.defer = true;
    g.src = "{{mtmUrl}}";
    s.parentNode.insertBefore(g, s);
</script>'
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
