<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\VGWortPreset as ProVGWortPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * VG WORT cookie preset.
 */
class VGWortPreset extends \DevOwl\RealCookieBanner\presets\pro\VGWortPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                // 'group' => __('Statistics', Hooks::TD_FORCED), // We do not preset a group for VG WORT
                'purpose' => __(
                    'The VG WORT sets a tracking pixel to measure accesses to texts to determine the copy probability of the text. In this way, the authors of this website participate in the payouts of VG WORT, which ensure the legal compensation for the use of copyrighted works in accordance with § 53 UrhG in Germany. Cookies are used to identify the user and, if necessary, to be able to link data from several visits of the texts.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'Verwertungsgesellschaft WORT (VG WORT)',
                'providerPrivacyPolicyUrl' => 'https://www.vgwort.de/hilfsseiten/datenschutz.html',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => 'srp',
                        'host' => 'vg01.met.vgwort.de',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \true,
                        'duration' => 0
                    ]
                ],
                'groupNotice' => \sprintf(
                    // translators:
                    __(
                        'Which group the VG WORT cookie should belong to is controversial. Therefore you have to make a decision yourself.<br /><br />According to the purpose defined below, the VG WORT cookie is a service that is used for tracking and should therefore be assigned to the group "Statistics". According to the Cookie Directive 2002/58/EC, the economic interest of authors to participate in the payouts of VG WORT does not entitle them to set the cookie without the user\'s consent (essential cookie). Further information on this legal opinion can be found on the Website of %1$sIT-Recht Kanzlei (German)%2$s.<br /><br />This is countered by the claim arising from %3$s§ 53 UrhG (German law)%4$s in Germany for compensation for the use of works protected by copyright. Without a counter for all users of a website, this entitlement cannot be enforced or can only be enforced incompletely, since without a counter it is not possible to determine how many users visit a text and thus the copying probability for the use of copyrighted works cannot be determined. Therefore, VG WORT should be classified as an essential cookie.<br /><br />In order to act legally, we recommend classifying the cookie as a “Statistics" cookie and blocking it by using a content blocker for users without consent. Pragmatically, however, this will significantly reduce or completely prevent your income from VG WORT payouts. Only by classifying the cookie as an "essential cookie" and no content blocker will you be able to receive the full VG WORT payouts to which you are entitled.',
                        RCB_TD
                    ),
                    // translators:
                    \sprintf(
                        '<a href="%s" target="_blank">',
                        __('https://www.it-recht-kanzlei.de/cookies-vg-wort-einwilligungspflicht.html', RCB_TD)
                    ),
                    '</a>',
                    // translators:
                    \sprintf(
                        '<a href="%s" target="_blank">',
                        __('https://www.gesetze-im-internet.de/urhg/__53.html', RCB_TD)
                    ),
                    '</a>'
                ),
                'technicalHandlingNotice' => __(
                    'If you have been assigned a pixel-code server other than "vg01.met.vgwort.de" by VG WORT, please replace the cookie host.',
                    RCB_TD
                ),
                'deleteTechnicalDefinitionsAfterOptOut' => \false
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
