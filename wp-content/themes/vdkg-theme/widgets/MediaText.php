<?php

namespace VdkgTheme\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) { exit; }

/**
 * Elementor widget: VDKG Media + Text
 *
 * Outputs a two-column layout with an image (left/right),
 * optional heading with selectable HTML tag (h1–h6), and rich text.
 */
class MediaText extends Widget_Base
{
    public function get_name() {
        return 'vdkg_media_text';
    }

    public function get_title() {
        return __('VDKG Media + Text', 'vdkg-theme');
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return ['vdkg-theme'];
    }

    public function get_keywords() {
        return ['vdkg', 'media', 'image', 'text', 'content', 'two column'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section('section_content', [
            'label' => __('Inhalt', 'vdkg-theme'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image', [
            'label'   => __('Bild', 'vdkg-theme'),
            'type'    => Controls_Manager::MEDIA,
            'default' => ['url' => Utils::get_placeholder_image_src()],
        ]);

        $this->add_control('image_position', [
            'label'   => __('Bild-Position', 'vdkg-theme'),
            'type'    => Controls_Manager::CHOOSE,
            'toggle'  => false, // behaves like radio group
            'default' => 'left',
            'options' => [
                'left'  => [ 'title' => __('Links', 'vdkg-theme'),  'icon' => 'eicon-h-align-left' ],
                'right' => [ 'title' => __('Rechts', 'vdkg-theme'), 'icon' => 'eicon-h-align-right' ],
            ],
        ]);

        $this->add_control('title', [
            'label'       => __('Überschrift (optional)', 'vdkg-theme'),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'label_block' => true,
            'placeholder' => __('Überschrift eingeben…', 'vdkg-theme'),
        ]);

        $this->add_control('title_tag', [
            'label'   => __('Überschrift-Level', 'vdkg-theme'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'h2',
            'options' => [
                'h1' => 'H1', 'h2' => 'H2', 'h3' => 'H3',
                'h4' => 'H4', 'h5' => 'H5', 'h6' => 'H6',
            ],
            'condition' => [ 'title!' => '' ],
        ]);

        $this->add_control('text', [
            'label'       => __('Text', 'vdkg-theme'),
            'type'        => Controls_Manager::WYSIWYG,
            'default'     => '',
            'placeholder' => __('Text eingeben…', 'vdkg-theme'),
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $s = $this->get_settings_for_display();

        $image_url = !empty($s['image']['url']) ? esc_url($s['image']['url']) : '';
        $pos       = ($s['image_position'] ?? 'left') === 'right' ? 'right' : 'left';
        $title     = trim($s['title'] ?? '');
        $tag       = in_array($s['title_tag'] ?? 'h2', ['h1','h2','h3','h4','h5','h6'], true) ? $s['title_tag'] : 'h2';

        $this->add_render_attribute('wrapper', 'class', 'vdkg-media-text');
        $this->add_render_attribute('wrapper', 'class', 'vdkg-media-text--image-' . $pos);
?>
        <section <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <?php if ($image_url): ?>
            <div class="vdkg-media-text__media">
                <img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr($title); ?>">
            </div>
            <?php endif; ?>
            <div class="vdkg-media-text__content">
                <?php if ($title !== ''): ?>
                    <<?php echo $tag; ?> class="vdkg-media-text__title"><?php echo esc_html($title); ?></<?php echo $tag; ?>>
                <?php endif; ?>
                <?php if (!empty($s['text'])): ?>
                    <div class="vdkg-media-text__text"><?php echo wp_kses_post($s['text']); ?></div>
                <?php endif; ?>
            </div>
        </section>
<?php
    }

    protected function content_template()
    {
?>
    <#
      var pos = settings.image_position === 'right' ? 'right' : 'left';
      var img = ( settings.image && settings.image.url ) ? settings.image.url : '';
      var title = settings.title ? settings.title : '';
      var tag = ['h1','h2','h3','h4','h5','h6'].includes(settings.title_tag) ? settings.title_tag : 'h2';
    #>
    <section class="vdkg-media-text vdkg-media-text--image-{{ pos }}">
        <# if ( img ) { #>
        <div class="vdkg-media-text__media">
            <img src="{{ img }}" alt="{{ title }}" />
        </div>
        <# } #>
        <div class="vdkg-media-text__content">
            <# if ( title ) { #>
              <{{ tag }} class="vdkg-media-text__title">{{{ title }}}</{{ tag }}>
            <# } #>
            <# if ( settings.text ) { #>
              <div class="vdkg-media-text__text">{{{ settings.text }}}</div>
            <# } #>
        </div>
    </section>
<?php
    }
}
