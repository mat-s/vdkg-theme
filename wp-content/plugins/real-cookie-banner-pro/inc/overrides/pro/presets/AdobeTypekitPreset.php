<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\free\GoogleFontsPreset;
use DevOwl\RealCookieBanner\presets\pro\AdobeTypekitPreset as ProAdobeTypekitPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Adobe Typekit cookie preset.
 */
class AdobeTypekitPreset extends \DevOwl\RealCookieBanner\presets\pro\AdobeTypekitPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Adobe Fonts (Typekit) is a service that downloads fonts that are not installed on the client device of the user and embeds them into the website. No cookies in the technical sense are set on the client of the user, but technical and personal data such as the IP address will be transmitted from the client to the server of the service provider to make the use of the service possible.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Adobe Systems Software Ireland Limited (Adobe Ireland)',
                'providerPrivacyPolicyUrl' => 'https://www.adobe.com/privacy/policies/adobe-fonts.html',
                'isEmbeddingOnlyExternalResources' => \true,
                'technicalHandlingNotice' => __(
                    'There is no need for an opt-in script, because this service is probably already injected via e.g. your theme. In addition to this cookie, please create a content blocker that automatically blocks the Adobe Fonts (Typekit) injection of e. g. your theme before you have the consent of your user.',
                    RCB_TD
                ),
                'codeOnPageLoad' =>
                    \DevOwl\RealCookieBanner\presets\free\GoogleFontsPreset::WEB_FONT_LOADER_ON_PAGE_LOAD,
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
