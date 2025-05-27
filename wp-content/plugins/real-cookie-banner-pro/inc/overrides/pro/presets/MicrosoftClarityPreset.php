<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\MicrosoftClarityPreset as ProMicrosoftClarityPreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Microsoft Clarity cookie preset.
 */
class MicrosoftClarityPreset extends \DevOwl\RealCookieBanner\presets\pro\MicrosoftClarityPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        $cookieHost = \DevOwl\RealCookieBanner\Utils::host(\DevOwl\RealCookieBanner\Utils::HOST_TYPE_CURRENT);
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Marketing', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Microsoft Clarity is a service for behavior analysis. It creates heat maps and session records of the website user. The cookies are used to identify the user across multiple sub-pages and to link the data collected during session recordings.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Microsoft Corporation',
                'providerPrivacyPolicyUrl' => 'https://clarity.microsoft.com/terms',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '_clck',
                        'host' => $cookieHost,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 1
                    ]
                ],
                'dynamicFields' => [
                    [
                        'name' => 'msClarityProjectId',
                        'label' => __('Microsoft Clarity Project ID', RCB_TD),
                        'expression' => '^[A-Za-z0-9]{8,}$',
                        'invalidMessage' => __('Please provide a valid ID!', RCB_TD),
                        'example' => '12cggd77jl',
                        'hint' => __(
                            'You can find your Microsoft Clarity Project ID in the tracking code or in the URL of your Clarity. For example, if the URL is <code>https://clarity.microsoft.com/projects/view/12cggd77jl/</code>, your project ID is <code>12cggd77jl</code>.',
                            RCB_TD
                        )
                    ]
                ],
                'codeOptIn' => '<script>
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "{{msClarityProjectId}}");
</script>',
                'deleteTechnicalDefinitionsAfterOptOut' => \true,
                'ePrivacyUSA' => \true,
                'createContentBlockerNotice' => \sprintf(
                    // translators:
                    __(
                        'You only need a content blocker if you embed %1$s <strong>outside of Real Cookie Banner</strong>, e.g. via the <a href="%2$s" target="_blank">%3$s</a>. In this case, you also must remove the "Code executed on opt-in".',
                        RCB_TD
                    ),
                    $parent['name'],
                    __('https://wordpress.org/plugins/microsoft-clarity/', RCB_TD),
                    'Microsoft Clarity WordPress Plugin'
                ),
                'shouldUncheckContentBlockerCheckbox' => \true
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
                'tagManagerOptInEventName' => 'ms-clarity-opt-in',
                'tagManagerOptOutEventName' => 'ms-clarity-opt-out'
            ]
        ];
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return [
            'attributes' => [
                'executeCodeOptInWhenNoTagManagerConsentIsGiven' => \true,
                'executeCodeOptOutWhenNoTagManagerConsentIsGiven' => \true,
                'tagManagerOptInEventName' => 'ms-clarity-opt-in',
                'tagManagerOptOutEventName' => 'ms-clarity-opt-out'
            ]
        ];
    }
}
