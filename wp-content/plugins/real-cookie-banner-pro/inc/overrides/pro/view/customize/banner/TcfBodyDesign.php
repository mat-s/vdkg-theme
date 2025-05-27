<?php

namespace DevOwl\RealCookieBanner\lite\view\customize\banner;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\CssMarginInput;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\RangeInput;
use DevOwl\RealCookieBanner\view\customize\banner\BodyDesign;
use DevOwl\RealCookieBanner\view\customize\banner\Design;
use DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign;
use WP_Customize_Color_Control;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * If TCF is active, add additional options.
 */
class TcfBodyDesign {
    const CONTROLS_STACK_BEFORE = \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::HEADLINE_BUTTON_ACCEPT_ALL;
    const HEADLINE_STACKS = \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION . '-headline-tcf-stacks';
    const HEADLINE_STACKS_BORDER =
        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION . '-headline-tcf-stacks-border';
    const HEADLINE_STACKS_TITLE =
        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION . '-headline-tcf-stacks-title';
    const HEADLINE_STACKS_DESCRIPTION =
        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION . '-headline-tcf-stacks-description';
    const SETTING = RCB_OPT_PREFIX . '-banner-body-design-tcf';
    const SETTING_STACKS_MARGIN = self::SETTING . '-stacks-margin';
    const SETTING_STACKS_PADDING = self::SETTING . '-stacks-padding';
    const SETTING_STACKS_ARROW_TYPE = self::SETTING . '-stacks-arrow-type';
    const SETTING_STACKS_ARROW_COLOR = self::SETTING . '-stacks-arrow-color';
    const SETTING_STACKS_BG = self::SETTING . '-stacks-bg';
    const SETTING_STACKS_ACTIVE_BG = self::SETTING . '-stacks-active-bg';
    const SETTING_STACKS_HOVER_BG = self::SETTING . '-stacks-hover-bg';
    const SETTING_STACKS_BORDER_WIDTH = self::SETTING . '-stacks-border-width';
    const SETTING_STACKS_BORDER_COLOR = self::SETTING . '-stacks-border-color';
    const SETTING_STACKS_TITLE_FONT_SIZE = self::SETTING . '-stacks-title-font-size';
    const SETTING_STACKS_TITLE_FONT_COLOR = self::SETTING . '-stacks-title-font-color';
    const SETTING_STACKS_TITLE_FONT_WEIGHT = self::SETTING . '-stacks-title-font-weight';
    const SETTING_STACKS_DESCRIPTION_MARGIN = self::SETTING . '-stacks-description-margin';
    const SETTING_STACKS_DESCRIPTION_FONT_SIZE = self::SETTING . '-stacks-description-font-size';
    const SETTING_STACKS_DESCRIPTION_FONT_COLOR = self::SETTING . '-stacks-description-font-color';
    const SETTING_STACKS_DESCRIPTION_FONT_WEIGHT = self::SETTING . '-stacks-description-font-weight';
    const DEFAULT_STACKS_MARGIN = [10, 0, 5, 0];
    const DEFAULT_STACKS_PADDING = [5, 10, 5, 10];
    const DEFAULT_STACKS_ARROW_TYPE = 'outlined';
    const DEFAULT_STACKS_ARROW_COLOR = \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::DEFAULT_DOTTED_GROUPS_BULLET_COLOR;
    const DEFAULT_STACKS_BG = \DevOwl\RealCookieBanner\view\customize\banner\Design::DEFAULT_COLOR_BG;
    const DEFAULT_STACKS_ACTIVE_BG = '#f9f9f9';
    const DEFAULT_STACKS_HOVER_BG = self::DEFAULT_STACKS_BORDER_COLOR;
    const DEFAULT_STACKS_TITLE_FONT_SIZE = \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::DEFAULT_TEACHINGS_FONT_SIZE;
    const DEFAULT_STACKS_TITLE_FONT_COLOR = \DevOwl\RealCookieBanner\view\customize\banner\Design::DEFAULT_FONT_COLOR;
    const DEFAULT_STACKS_TITLE_FONT_WEIGHT = \DevOwl\RealCookieBanner\view\customize\banner\Design::DEFAULT_FONT_WEIGHT;
    const DEFAULT_STACKS_DESCRIPTION_MARGIN = [5, 0, 0, 0];
    const DEFAULT_STACKS_DESCRIPTION_FONT_SIZE = self::DEFAULT_STACKS_TITLE_FONT_SIZE;
    const DEFAULT_STACKS_DESCRIPTION_FONT_COLOR = '#828282';
    const DEFAULT_STACKS_DESCRIPTION_FONT_WEIGHT = self::DEFAULT_STACKS_TITLE_FONT_WEIGHT;
    const DEFAULT_STACKS_BORDER_WIDTH = 1;
    const DEFAULT_STACKS_BORDER_COLOR = \DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign::DEFAULT_BOTTOM_BORDER_COLOR;
    /**
     * Singleton instance.
     *
     * @var TcfBodyDesign
     */
    private static $me = null;
    /**
     * Add additional fields for TCF stacks.
     *
     * @param array $sections
     */
    public function stacks(&$sections) {
        $controls = &$sections[\DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION]['controls'];
        // Insert before "Button: Accept all"
        $offset = \array_search(self::CONTROLS_STACK_BEFORE, \array_keys($controls), \true);
        $newControls = [
            self::HEADLINE_STACKS => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                'name' => 'bodyDesignTcfStacks',
                'label' => __('TCF stacks', RCB_TD)
            ],
            self::SETTING_STACKS_MARGIN => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\CssMarginInput::class,
                'name' => 'tcfStacksMargin',
                'label' => __('Margin', RCB_TD),
                'description' => __('Define outer distance of the container.', RCB_TD),
                'setting' => ['default' => self::DEFAULT_STACKS_MARGIN]
            ],
            self::SETTING_STACKS_PADDING => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\CssMarginInput::class,
                'name' => 'tcfStacksPadding',
                'label' => __('Padding', RCB_TD),
                'description' => __('Define inner distance of one stack.', RCB_TD),
                'dashicon' => 'editor-contract',
                'setting' => ['default' => self::DEFAULT_STACKS_PADDING]
            ],
            self::SETTING_STACKS_ARROW_TYPE => [
                'name' => 'tcfStacksArrowType',
                'label' => __('Arrow type', RCB_TD),
                'type' => 'select',
                'choices' => [
                    'none' => __('None', RCB_TD),
                    'filled' => __('Filled', RCB_TD),
                    'outlined' => __('Outlined', RCB_TD)
                ],
                'setting' => ['default' => self::DEFAULT_STACKS_ARROW_TYPE]
            ],
            self::SETTING_STACKS_ARROW_COLOR => [
                'name' => 'tcfStacksArrowColor',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Arrow color', RCB_TD),
                'setting' => [
                    'default' => self::DEFAULT_STACKS_ARROW_COLOR,
                    'sanitize_callback' => 'sanitize_hex_color'
                ]
            ],
            self::SETTING_STACKS_BG => [
                'name' => 'tcfStacksBg',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Background color', RCB_TD),
                'setting' => ['default' => self::DEFAULT_STACKS_BG, 'sanitize_callback' => 'sanitize_hex_color']
            ],
            self::SETTING_STACKS_ACTIVE_BG => [
                'name' => 'tcfStacksActiveBg',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Background color when active', RCB_TD),
                'setting' => ['default' => self::DEFAULT_STACKS_ACTIVE_BG, 'sanitize_callback' => 'sanitize_hex_color']
            ],
            self::SETTING_STACKS_HOVER_BG => [
                'name' => 'tcfStacksHoverBg',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Background color on hover', RCB_TD),
                'setting' => ['default' => self::DEFAULT_STACKS_HOVER_BG, 'sanitize_callback' => 'sanitize_hex_color']
            ],
            self::HEADLINE_STACKS_BORDER => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                'name' => 'bodyDesignTcfStacksBorder',
                'label' => __('Border', RCB_TD),
                'level' => 3,
                'isSubHeadline' => \true
            ],
            self::SETTING_STACKS_BORDER_WIDTH => [
                'name' => 'tcfStacksBorderWidth',
                'type' => 'number',
                'input_attrs' => ['min' => 0],
                'label' => __('Border width (px)', RCB_TD),
                'setting' => ['default' => self::DEFAULT_STACKS_BORDER_WIDTH, 'sanitize_callback' => 'absint']
            ],
            self::SETTING_STACKS_BORDER_COLOR => [
                'name' => 'tcfStacksBorderColor',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Color', RCB_TD),
                'setting' => [
                    'default' => self::DEFAULT_STACKS_BORDER_COLOR,
                    'sanitize_callback' => 'sanitize_hex_color'
                ]
            ],
            self::HEADLINE_STACKS_TITLE => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                'name' => 'bodyDesignTcfStacksTitle',
                'label' => __('Title', RCB_TD),
                'level' => 3,
                'isSubHeadline' => \true
            ],
            self::SETTING_STACKS_TITLE_FONT_SIZE => [
                'name' => 'tcfStacksTitleFontSize',
                'label' => __('Size', RCB_TD),
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\RangeInput::class,
                'unit' => 'px',
                'input_attrs' => ['min' => 10, 'max' => 30, 'step' => 0],
                'setting' => ['default' => self::DEFAULT_STACKS_TITLE_FONT_SIZE, 'sanitize_callback' => 'absint']
            ],
            self::SETTING_STACKS_TITLE_FONT_COLOR => [
                'name' => 'tcfStacksTitleFontColor',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Color', RCB_TD),
                'setting' => [
                    'default' => self::DEFAULT_STACKS_TITLE_FONT_COLOR,
                    'sanitize_callback' => 'sanitize_hex_color'
                ]
            ],
            self::SETTING_STACKS_TITLE_FONT_WEIGHT => [
                'name' => 'tcfStacksTitleFontWeight',
                'label' => __('Font weight', RCB_TD),
                'type' => 'select',
                'choices' => \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::getFontWeightChoices(),
                'setting' => ['default' => self::DEFAULT_STACKS_TITLE_FONT_WEIGHT]
            ],
            self::HEADLINE_STACKS_DESCRIPTION => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                'name' => 'bodyDesignTcfStacksDescription',
                'label' => __('Description', RCB_TD),
                'level' => 3,
                'isSubHeadline' => \true
            ],
            self::SETTING_STACKS_DESCRIPTION_MARGIN => [
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\CssMarginInput::class,
                'name' => 'tcfStacksDescriptionMargin',
                'label' => __('Padding', RCB_TD),
                // for the user it is more like a padding
                'description' => __('Define inner distance of the description paragraph.', RCB_TD),
                'setting' => ['default' => self::DEFAULT_STACKS_DESCRIPTION_MARGIN]
            ],
            self::SETTING_STACKS_DESCRIPTION_FONT_SIZE => [
                'name' => 'tcfStacksDescriptionFontSize',
                'label' => __('Size', RCB_TD),
                'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\RangeInput::class,
                'unit' => 'px',
                'input_attrs' => ['min' => 10, 'max' => 30, 'step' => 0],
                'setting' => ['default' => self::DEFAULT_STACKS_DESCRIPTION_FONT_SIZE, 'sanitize_callback' => 'absint']
            ],
            self::SETTING_STACKS_DESCRIPTION_FONT_COLOR => [
                'name' => 'tcfStacksDescriptionFontColor',
                'class' => \WP_Customize_Color_Control::class,
                'label' => __('Color', RCB_TD),
                'setting' => [
                    'default' => self::DEFAULT_STACKS_DESCRIPTION_FONT_COLOR,
                    'sanitize_callback' => 'sanitize_hex_color'
                ]
            ],
            self::SETTING_STACKS_DESCRIPTION_FONT_WEIGHT => [
                'name' => 'tcfStacksDescriptionFontWeight',
                'label' => __('Font weight', RCB_TD),
                'type' => 'select',
                'choices' => \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::getFontWeightChoices(),
                'setting' => ['default' => self::DEFAULT_STACKS_DESCRIPTION_FONT_WEIGHT]
            ]
        ];
        $controls =
            \array_slice($controls, 0, $offset, \true) + $newControls + \array_slice($controls, $offset, null, \true);
        return $sections;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\lite\view\customize\banner\TcfBodyDesign())
            : self::$me;
    }
}
