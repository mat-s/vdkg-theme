<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\EzoicMarketingPreset as ProEzoicMarketingPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Ezoic (Marketing) preset.
 */
class EzoicMarketingPreset extends \DevOwl\RealCookieBanner\presets\pro\EzoicMarketingPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        $purposePrivacyLink = \sprintf('https://g.ezoic.net/privacy/%s', $cookieHost);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => \sprintf(
                    // translators:
                    __(
                        'Ezoic is a platform for optimized display of advertising and performance-optimized serving of websites. With your consent, we display personalized advertising for you on this website. In the process, personal data about you, such as your IP address or associated estimates about your age and gender, are shared with advertising partners. The advertising partners may also place cookies on your computer, for example, to measure the success of their advertising, to be able to play advertising in a more targeted manner or to record your interaction behavior with the content and advertising. Which advertising partners are used and consequently which cookies are used depends on which advertisements are played for you. At %s you can always see what data we collect about you, with which advertising partners we share it and which cookies our advertising partners set.',
                        \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                    ),
                    \sprintf('<a href="%1$s" target="_blank">%1$s</a>', esc_url($purposePrivacyLink))
                ),
                'provider' => 'Ezoic Inc.',
                'providerPrivacyPolicyUrl' => __(
                    'https://www.ezoic.com/privacy-policy/',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'isEmbeddingOnlyExternalResources' => \true,
                'technicalHandlingNotice' => __(
                    'No technical definitions of cookies are given, as Ezoic cannot determine them in advance. Instead, a link is provided in the "Purpose" field where your visitors can view the dynamically used advertisers and their cookies.',
                    RCB_TD
                ),
                'codeOptIn' =>
                    "<script>\nif (typeof ezConsentCategories == 'object' && typeof __ezconsent == 'object') {\n    window.ezConsentCategories.marketing = true;\n}\n</script>",
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
