<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\GtmPreset as ProGtmPreset;
use DevOwl\RealCookieBanner\settings\General;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Tag Manager cookie preset.
 */
class GtmPreset extends \DevOwl\RealCookieBanner\presets\pro\GtmPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $isDisabled =
            \DevOwl\RealCookieBanner\settings\General::getInstance()->getSetCookiesViaManager() !== 'googleTagManager';
        return \array_merge($parent, [
            'disabled' => $isDisabled,
            'tags' => $isDisabled
                ? [
                    __('Disabled', RCB_TD) => \sprintf(
                        // translators:
                        __('Please activate %s in settings to use this template.', RCB_TD),
                        __('Google Tag Manager', RCB_TD)
                    )
                ]
                : [],
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Google Tag Manager is a service for managing tags triggered by a specific event that injects a third script or sends data to a third service. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Google Ireland Limited',
                'providerPrivacyPolicyUrl' => 'https://policies.google.com/privacy',
                'isEmbeddingOnlyExternalResources' => \true,
                'ePrivacyUSA' => \true,
                'dynamicFields' => [
                    [
                        'name' => 'gtmContainerId',
                        'label' => __('Google Tag Manager Container ID', RCB_TD),
                        'expression' => '^GTM-(.+)$',
                        'invalidMessage' => __('Please fill in a valid container ID!', RCB_TD),
                        'example' => 'GTM-K596L4W'
                    ]
                ],
                'codeOptIn' => '<script>
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != "dataLayer" ? "&l=" + l : "";
        j.async = true;
        j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "{{gtmContainerId}}");
</script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{gtmContainerId}}" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>'
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
