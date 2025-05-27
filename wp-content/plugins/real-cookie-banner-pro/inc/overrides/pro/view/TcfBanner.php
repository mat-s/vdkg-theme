<?php

namespace DevOwl\RealCookieBanner\lite\view;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\ContrastRatioValidator;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration;
use DevOwl\RealCookieBanner\lite\view\customize\banner\TcfTexts;
use DevOwl\RealCookieBanner\settings\TCF;
use DevOwl\RealCookieBanner\view\BannerCustomize;
use DevOwl\RealCookieBanner\view\customize\banner\BasicLayout;
use DevOwl\RealCookieBanner\view\customize\banner\BodyDesign;
use DevOwl\RealCookieBanner\view\customize\banner\Decision;
use DevOwl\RealCookieBanner\view\customize\banner\Design;
use DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton;
use DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist;
use DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\StackCalculator;
use DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Utils as TcfVendorListNormalizeUtils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * If TCF is active, we need to modify some behaviors like forbid the use of "Hide"
 * in decisions in customizer. For "new controls" check out the `TcfBannerCustomize` class.
 */
class TcfBanner {
    const MINIMUM_BUTTON_CONTRAST_RATIO = 5;
    /**
     * Singleton instance.
     *
     * @var TcfBanner
     */
    private static $me = null;
    /**
     * Make texts multilingual.
     */
    public function multilingual() {
        $comp = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        $adminDefaultTcfTexts = \DevOwl\RealCookieBanner\lite\view\customize\banner\TcfTexts::getDefaultTexts();
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\lite\view\customize\banner\TcfTexts::SETTING_STACKS_CUSTOM_NAME,
            $adminDefaultTcfTexts['stackCustomName']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\lite\view\customize\banner\TcfTexts::SETTING_STACKS_CUSTOM_DESCRIPTION,
            $adminDefaultTcfTexts['stackCustomDescription']
        );
    }
    /**
     * Localize the used vendors and purposes for the frontend.
     *
     * We do not need to translate it with our `AbstractLanguagePlugin` as the TCF
     * vendor list and purposes are already localized.
     */
    public function localize() {
        if (!\DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive()) {
            return [];
        }
        $output = [
            'vendors' => [],
            'stacks' => [],
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_PURPOSES => [],
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_SPECIAL_PURPOSES => [],
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_FEATURES => [],
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_SPECIAL_FEATURES => []
        ];
        $vendorConfigurations = \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::getInstance()->getOrdered();
        $tcfQuery = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getTcfVendorListNormalizer()
            ->getQuery();
        $usedDeclarations = [];
        // Collect all vendors and read them in batch
        $vendorIds = [];
        foreach ($vendorConfigurations as $vendorConfiguration) {
            $vendorIds[] = $vendorConfiguration->metas['vendorId'];
        }
        $vendors = \count($vendorIds) > 0 ? $tcfQuery->vendors(['in' => $vendorIds])['vendors'] : [];
        // Prepare the vendor rows
        foreach ($vendorConfigurations as $vendorConfiguration) {
            $vendorId = $vendorConfiguration->metas['vendorId'];
            if (!isset($vendors[$vendorId])) {
                // Vendor does no longer exist?
                continue;
            }
            $vendor = $vendors[$vendorId];
            $row = \array_merge(['id' => $vendorConfiguration->ID], $vendorConfiguration->metas);
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Utils::correctRestrictivePurposes(
                \DevOwl\RealCookieBanner\settings\TCF::getInstance()->getScopeOfConsent(),
                $vendor,
                $row[\DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::META_NAME_RESTRICTIVE_PURPOSES],
                $usedDeclarations
            );
            $output['vendorConfigurations'][$vendorId] = $row;
            $output['vendors'][$vendorId] = $vendor;
        }
        // Map declaration types to objects and mark unused
        $output = \array_merge($output, $tcfQuery->allDeclarations(['onlyReturnDeclarations' => \true]));
        foreach (
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPES
            as $declaration
        ) {
            foreach ($output[$declaration] as $id => $declarationObject) {
                if (isset($usedDeclarations[$declaration]) && !\in_array($id, $usedDeclarations[$declaration], \true)) {
                    $output['unused'][$declaration][] = $id;
                }
            }
        }
        foreach (
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPES
            as $declaration
        ) {
            $output['unused'][$declaration] = $output['unused'][$declaration] ?? [];
        }
        // Calculate stacks on used
        if (\count($usedDeclarations) > 0) {
            $output['stacks'] = (new \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\StackCalculator(
                $tcfQuery->stacks()['stacks'],
                $usedDeclarations
            ))->calculateBestSuitableStacks();
        }
        // Cast the output values to objects as they can be empty
        foreach (\array_keys($output) as $key) {
            $output[$key] = (object) $output[$key];
        }
        return $output;
    }
    /**
     * Texts for TCF groups view.
     */
    public function localizeTexts() {
        return \DevOwl\RealCookieBanner\Core::getInstance()
            ->getCompLanguage()
            ->translateArray(
                [
                    'tcf' => [
                        'listOfServicesAppendix' => _x(
                            'In addition, you consent to the transfer of data to partners under the TCF standard for the following purposes:',
                            'legal-text',
                            RCB_TD
                        ),
                        'vendorList' => _x('Vendor list', 'legal-text', RCB_TD),
                        'vendors' => _x('Vendors', 'legal-text', RCB_TD),
                        'showMore' => __('Show more', RCB_TD),
                        'hideMore' => __('Hide', RCB_TD),
                        'filterText' => _x('Data processing on the legal basis of:', 'legal-text', RCB_TD),
                        'filterNoVendors' => _x(
                            'No vendor requests purposes under this legal basis.',
                            'legal-text',
                            RCB_TD
                        ),
                        'nonStandard' => _x('Non-standardized data processing', 'legal-text', RCB_TD),
                        'nonStandardDesc' => _x(
                            'Some services set cookies and/or process personal data without complying with consent communication standards. These services are divided into several groups. So-called "essential services" are used based on legitimate interest and cannot be opted out (an objection may have to be made by email or letter in accordance with the privacy policy), while all other services are used only after consent has been given.',
                            'legal-text',
                            RCB_TD
                        ),
                        'tcfStandard' => _x('Data processing standardized according to TCF', 'legal-text', RCB_TD),
                        'tcfStandardDesc' => _x(
                            'The Transparency and Consent Framework (TCF) is a standard for obtaining consistent consent for processing of personal data and cookie setting. This should enable all parties in the digital (advertising) chain to ensure that they set, process and store data and cookies in accordance with the GDPR and the ePrivacy Directive.',
                            #
                            'legal-text',
                            RCB_TD
                        ),
                        'declarations' => [
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_PURPOSES => [
                                'title' => _x('Purposes', 'legal-text', RCB_TD),
                                'desc' => _x(
                                    'Purposes describe for which purpose which providers may set cookies and process personal data. Purposes are pre-selected if there is a legitimate interest for its data processing. For all other purposes, data will only be processed with explicit consent.',
                                    'legal-text',
                                    RCB_TD
                                )
                            ],
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_SPECIAL_PURPOSES => [
                                'title' => _x('Special purposes', 'legal-text', RCB_TD),
                                'desc' => _x(
                                    'Special purposes for setting cookies and processing personal data by our vendors describe purposes for which we have a legitimate interest that cannot be rejected. For example, we need to process data to prevent fraud.',
                                    'legal-text',
                                    RCB_TD
                                )
                            ],
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_FEATURES => [
                                'title' => _x('Features', 'legal-text', RCB_TD),
                                'desc' => _x(
                                    'Features for processing personal data describe how data is used to fulfill one or more purposes. Features cannot be opted out, but in the "Purposes" section, purposes that lead to the use of features can be selected or deselected. Any purpose can lead to features being used.',
                                    'legal-text',
                                    RCB_TD
                                )
                            ],
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_SPECIAL_FEATURES => [
                                'title' => _x('Special features', 'legal-text', RCB_TD),
                                'desc' => _x(
                                    'Special features for processing personal data describe how data is used to fulfill one or more purposes in a profound way. Personal data will only be processed in this way with explicit consent.',
                                    'legal-text',
                                    RCB_TD
                                )
                            ]
                        ]
                    ]
                ],
                [],
                null,
                ['legal-text']
            );
    }
    /**
     * Other metadata available like GVL download time, TCF policy version, ...
     */
    public function localizeMetadata() {
        if (!\DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive()) {
            return [];
        }
        $output = [];
        $tcfQuery = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getTcfVendorListNormalizer()
            ->getQuery();
        list($gvlSpecificationVersion, $tcfPolicyVersion) = $tcfQuery->getLatestUsedPurposeVersions(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPE_PURPOSES
        );
        $output['latestGvlDownload'] = mysql2date(
            'c',
            \DevOwl\RealCookieBanner\settings\TCF::getInstance()->getGvlDownloadTime(),
            \false
        );
        $output['publisherCc'] = \DevOwl\RealCookieBanner\settings\TCF::getInstance()->getPublisherCountryCode();
        $output['gvlSpecificationVersion'] = $gvlSpecificationVersion;
        $output['tcfPolicyVersion'] = $tcfPolicyVersion;
        $output['vendorListVersion'] = $tcfQuery->getLatestUsedVendorListVersion();
        $output['scope'] = \DevOwl\RealCookieBanner\settings\TCF::getInstance()->getScopeOfConsent();
        $output['language'] = $tcfQuery->getCurrentLanguage();
        return $output;
    }
    /**
     * Initialize filters at `plugins_loaded` time.
     */
    public function hooks() {
        if (\DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive()) {
            add_filter('DevOwl/Customize/Sections/' . \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN, [
                $this,
                'customizeBasicLayoutHint'
            ]);
            add_filter('DevOwl/Customize/Sections/' . \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN, [
                $this,
                'customizeDisableHide'
            ]);
            add_filter('DevOwl/Customize/Sections/' . \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN, [
                $this,
                'customizeButtonFontSizeNotice'
            ]);
            add_filter('DevOwl/Customize/Sections/' . \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN, [
                $this,
                'customizeButtonContrastRatioValidator'
            ]);
            add_filter(
                'option_' . \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_GROUPS_FIRST_VIEW,
                '__return_false'
            );
            // `pre_option_{option}` does not support `false` as return
            add_filter(
                'pre_option_' . \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ALL,
                [$this, 'optionDisableDecisionHide'],
                10,
                2
            );
            add_filter(
                'pre_option_' . \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ESSENTIALS,
                [$this, 'optionDisableDecisionHide'],
                10,
                2
            );
            add_filter(
                'pre_option_' . \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_INDIVIDUAL,
                [$this, 'optionDisableDecisionHide'],
                10,
                2
            );
        }
    }
    /**
     * Add a notice to the "Basic Layout" section.
     *
     * @param array $sections
     */
    public function customizeBasicLayoutHint(&$sections) {
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SETTING_TYPE
        ]['description'] = \sprintf(
            '<div class="notice notice-info inline below-h2 notice-alt" style="margin: 10px 0"><p>%s</p></div>',
            __(
                'The TCF requires that the consent dialogue must "[cover] all or substantially all of the content of the website". We therefore recommend displaying the consent dialogue as a banner in the middle of the website. Also make sure that the overlay remains active so that your website cannot be used until the consent decision has been made.',
                RCB_TD
            )
        );
        return $sections;
    }
    /**
     * The decisions no longer can have the "Hide" as available dropdown selection, remove it.
     *
     * @param array $sections
     */
    public function customizeDisableHide(&$sections) {
        foreach (
            [
                \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ALL,
                \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ESSENTIALS,
                \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_INDIVIDUAL
            ]
            as $key
        ) {
            $setting = &$sections[\DevOwl\RealCookieBanner\view\customize\banner\Decision::SECTION]['controls'][$key];
            \array_pop($setting['choices']);
        }
        return $sections;
    }
    /**
     * If TCF is active, the font (family), font size and font weight must be the same as of "Accept all".
     *
     * @param array $sections
     */
    public function customizeButtonFontSizeNotice(&$sections) {
        $notice = \sprintf(
            '<div class="notice notice-info inline below-h2 notice-alt" style="margin: 10px 0 0 0"><p>%s</p></div>',
            __(
                'You currently have TCF mode enabled. Therefore, you are not allowed to change the font size and font thickness for this button.',
                RCB_TD
            )
        );
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::HEADLINE_BUTTON_ACCEPT_ESSENTIALS_FONT
        ]['description'] = $notice;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::HEADLINE_FONT
        ]['description'] = $notice;
        return $sections;
    }
    /**
     * If TCF is active, there must be a minimum contrast ratio of 5 for call-to-action buttons.
     *
     * @param array $sections
     */
    public function customizeButtonContrastRatioValidator(&$sections) {
        $panel = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBanner()
            ->getCustomize();
        // translators:
        $message = __(
            'Your current contrast ratio between background and font color (%1$s) does not reach the minimum of %2$s. Please adjust your colors!',
            RCB_TD
        );
        // Accept all
        $validator = [
            new \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\ContrastRatioValidator(
                $message,
                self::MINIMUM_BUTTON_CONTRAST_RATIO,
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_BG,
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_FONT_COLOR,
                $panel,
                function ($color1, $color2, $panel) {
                    // If the button is a link, use the main background color
                    if (
                        \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils::getValue(
                            \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ALL,
                            $panel
                        ) === 'link'
                    ) {
                        return [
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils::getValue(
                                \DevOwl\RealCookieBanner\view\customize\banner\Design::SETTING_COLOR_BG,
                                $panel
                            ),
                            $color2
                        ];
                    }
                    return [$color1, $color2];
                }
            ),
            'validate_callback'
        ];
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\Decision::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ALL
        ]['setting']['validate_callback'] = $validator;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_BG
        ]['setting']['validate_callback'] = $validator;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_FONT_COLOR
        ]['setting']['validate_callback'] = $validator;
        // Accept essentials
        $validator = [
            new \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\ContrastRatioValidator(
                $message,
                self::MINIMUM_BUTTON_CONTRAST_RATIO,
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ESSENTIALS_BG,
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ESSENTIALS_FONT_COLOR,
                $panel,
                function ($color1, $color2, $panel) {
                    // If the button is a link, use the main background color
                    if (
                        \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils::getValue(
                            \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ESSENTIALS,
                            $panel
                        ) === 'link'
                    ) {
                        return [
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils::getValue(
                                \DevOwl\RealCookieBanner\view\customize\banner\Design::SETTING_COLOR_BG,
                                $panel
                            ),
                            $color2
                        ];
                    }
                    return [$color1, $color2];
                }
            ),
            'validate_callback'
        ];
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\Decision::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ESSENTIALS
        ]['setting']['validate_callback'] = $validator;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ESSENTIALS_BG
        ]['setting']['validate_callback'] = $validator;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ESSENTIALS_FONT_COLOR
        ]['setting']['validate_callback'] = $validator;
        // Save custom choices
        $validator = [
            new \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\ContrastRatioValidator(
                $message,
                self::MINIMUM_BUTTON_CONTRAST_RATIO,
                \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_BG,
                \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_FONT_COLOR,
                $panel,
                function ($color1, $color2, $panel) {
                    // If the button is a link, use the main background color
                    if (
                        \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils::getValue(
                            \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_TYPE,
                            $panel
                        ) === 'link'
                    ) {
                        return [
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Utils::getValue(
                                \DevOwl\RealCookieBanner\view\customize\banner\Design::SETTING_COLOR_BG,
                                $panel
                            ),
                            $color2
                        ];
                    }
                    return [$color1, $color2];
                }
            ),
            'validate_callback'
        ];
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_TYPE
        ]['setting']['validate_callback'] = $validator;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_BG
        ]['setting']['validate_callback'] = $validator;
        $sections[\DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SECTION]['controls'][
            \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_FONT_COLOR
        ]['setting']['validate_callback'] = $validator;
        return $sections;
    }
    /**
     * The decisions no longer can have "Hide" as value, fallback to default.
     *
     * @param string $value
     * @param string $id
     */
    public function optionDisableDecisionHide($value, $id) {
        remove_filter('pre_option_' . $id, [$this, 'optionDisableDecisionHide']);
        $original = get_option($id);
        add_filter('pre_option_' . $id, [$this, 'optionDisableDecisionHide'], 10, 2);
        if ($original !== 'hide') {
            return $value;
        }
        switch ($id) {
            case \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ALL:
            case \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_ESSENTIALS:
                return \DevOwl\RealCookieBanner\view\customize\banner\Decision::DEFAULT_ACCEPT_ALL;
            case \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_INDIVIDUAL:
                return \DevOwl\RealCookieBanner\view\customize\banner\Decision::DEFAULT_ACCEPT_INDIVIDUAL;
            default:
                break;
        }
        return $value;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\lite\view\TcfBanner()) : self::$me;
    }
}
