<?php

namespace VdkgTheme\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Utils;

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Elementor widget: VDKG Slider Repeater
 *
 * Renders a Swiper slider with repeater items (image, title, text, link)
 * and optional navigation icons. Styling is handled in theme SCSS.
 */
class SliderRepeater extends Widget_Base
{

  /**
   * Internal widget slug.
   */
  public function get_name()
  {
    return 'vdkg_slider_repeater';
  }

  /**
   * Visible widget title in Elementor panel.
   */
  public function get_title()
  {
    return __('VDKG Slider Repeater', 'vdkg-theme');
  }

  /**
   * Panel icon.
   */
  public function get_icon()
  {
    return 'eicon-slider-push';
  }

  /**
   * Widget categories.
   */
  public function get_categories()
  {
    return ['vdkg-theme'];
  }

  /**
   * Search keywords shown in Elementor panel.
   *
   * @return string[]
   */
  public function get_keywords()
  {
    return ['vdkg', 'slider', 'carousel', 'repeater', 'image', 'content', 'swiper'];
  }

  /**
   * Script handles to enqueue for this widget.
   * Ensure Swiper and Elementor frontend are present.
   *
   * @return string[]
   */
  public function get_script_depends()
  {
    return ['swiper', 'elementor-frontend'];
  }

  /**
   * Style handles required for this widget.
   * Loads Swiper CSS shipped with Elementor.
   *
   * @return string[]
   */
  public function get_style_depends()
  {
    // Elementor registers Swiper CSS under 'swiper'.
    // If your setup uses a different handle, let me know and I’ll adapt.
    return ['swiper'];
  }

  /**
   * Register widget controls (content only; no style controls).
   */
  protected function _register_controls()
  {
    // Content section with repeater
    $this->start_controls_section('section_content', [
      'label' => __('Content', 'vdkg-theme'),
      'tab'   => Controls_Manager::TAB_CONTENT,
    ]);

    $repeater = new Repeater();

    $repeater->add_control('image', [
      'label'   => __('Bild', 'vdkg-theme'),
      'type'    => Controls_Manager::MEDIA,
      'default' => ['url' => Utils::get_placeholder_image_src()],
    ]);

    $repeater->add_control('title', [
      'label'       => __('Titel', 'vdkg-theme'),
      'type'        => Controls_Manager::TEXT,
      'default'     => __('Titel', 'vdkg-theme'),
      'label_block' => true,
    ]);

    $repeater->add_control('text', [
      'label'       => __('Text', 'vdkg-theme'),
      'type'        => Controls_Manager::TEXTAREA,
      'rows'        => 4,
      'default'     => '',
      'label_block' => true,
    ]);

    $repeater->add_control('link', [
      'label'         => __('Link', 'vdkg-theme'),
      'type'          => Controls_Manager::URL,
      'placeholder'   => __('https://example.com', 'vdkg-theme'),
      'show_external' => true,
      'default'       => ['url' => '', 'is_external' => false, 'nofollow' => false],
    ]);

    $this->add_control('slides', [
      'label'       => __('Slides', 'vdkg-theme'),
      'type'        => Controls_Manager::REPEATER,
      'fields'      => $repeater->get_controls(),
      'default'     => [],
      'title_field' => '{{{ title }}}',
    ]);

    $this->end_controls_section();

    // Navigation icons (still under content tab as requested)
    $this->start_controls_section('section_navigation', [
      'label' => __('Navigation', 'vdkg-theme'),
      'tab'   => Controls_Manager::TAB_CONTENT,
    ]);

    $this->add_control('prev_icon', [
      'label'   => __('Prev Icon', 'vdkg-theme'),
      'type'    => Controls_Manager::ICONS,
      'default' => ['value' => 'eicon-chevron-left', 'library' => 'eicons'],
    ]);

    $this->add_control('next_icon', [
      'label'   => __('Next Icon', 'vdkg-theme'),
      'type'    => Controls_Manager::ICONS,
      'default' => ['value' => 'eicon-chevron-right', 'library' => 'eicons'],
    ]);

    $this->end_controls_section();

    // Intentionally no Style sections – keep backend styling empty
  }

  /**
   * Frontend render using mixed PHP/HTML (no monolithic echo output).
   */
  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $slides   = isset($settings['slides']) && is_array($settings['slides']) ? $settings['slides'] : [];

    if (empty($slides)) {
      return;
    }

    $this->add_render_attribute('wrapper', 'class', 'vdkg-slider swiper');
    $this->add_render_attribute('wrapper', 'data-widget', 'vdkg-slider-repeater');
?>
    <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div class="swiper-wrapper">
        <?php foreach ($slides as $item) :
          $img_url  = !empty($item['image']['url']) ? esc_url($item['image']['url']) : '';
          $title    = isset($item['title']) ? $item['title'] : '';
          $text     = isset($item['text']) ? $item['text'] : '';
          $link     = isset($item['link']['url']) ? $item['link']['url'] : '';
          $is_ext   = !empty($item['link']['is_external']);
          $nofollow = !empty($item['link']['nofollow']);

          $target   = $is_ext ? ' target="_blank"' : '';
          $rel_bits = [];
          if ($nofollow) {
            $rel_bits[] = 'nofollow';
          }
          if ($is_ext) {
            $rel_bits[] = 'noopener';
          }
          $rel_attr = $rel_bits ? ' rel="' . esc_attr(implode(' ', $rel_bits)) . '"' : '';
        ?>
          <div class="swiper-slide">
            <div class="vdkg-slide">
              <?php if (!empty($link)) : ?>
                <a class="vdkg-slide__link" href="<?php echo esc_url($link); ?>" <?php echo $target . $rel_attr; ?>>
              <?php endif; ?>

              <?php if ($img_url) : ?>
                <div class="vdkg-slide__image">
                  <img src="<?php echo $img_url; ?>" alt="<?php echo esc_attr($title); ?>">
                </div>
              <?php endif; ?>

              <div class="vdkg-slide__content">
                <?php if (!empty($title)) : ?>
                  <h2 class="vdkg-slide__title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if (!empty($text)) : ?>
                  <span class="vdkg-slide__text"><?php echo wp_kses_post($text); ?></span>
                <?php endif; ?>
              </div>

              <?php if (!empty($link)) : ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

            <div class="vdkg-slider__nav">
                <button class="vdkg-slider__prev" type="button" aria-label="<?php echo esc_attr__('Previous slide', 'vdkg-theme'); ?>">
                  <?php if (!empty($settings['prev_icon'])) {
                    Icons_Manager::render_icon($settings['prev_icon'], ['aria-hidden' => 'true']);
                  } ?>
                </button>
                <button class="vdkg-slider__next" type="button" aria-label="<?php echo esc_attr__('Next slide', 'vdkg-theme'); ?>">
                  <?php if (!empty($settings['next_icon'])) {
                    Icons_Manager::render_icon($settings['next_icon'], ['aria-hidden' => 'true']);
                  } ?>
                </button>
              </div>
            </div>
  <?php
  }

  /**
   * Editor preview template (Elementor panel). Uses underscore.js templating.
   */
  protected function content_template()
  {
    $aria_prev = esc_attr__('Previous slide', 'vdkg-theme');
    $aria_next = esc_attr__('Next slide', 'vdkg-theme');
  ?>
    <# if ( _.isEmpty( settings.slides ) ) { return; } #>
      <div class="vdkg-slider swiper" data-widget="vdkg-slider-repeater">
        <div class="swiper-wrapper">
          <# _.each( settings.slides, function( item ){
            var img=( item.image && item.image.url ) ? item.image.url : '' ;
            var title=item.title || '' ;
            var text=item.text || '' ;
            var link=( item.link && item.link.url ) ? item.link.url : '' ;
            var isExternal=item.link && item.link.is_external;
            var nofollow=item.link && item.link.nofollow;
            var target=isExternal ? ' target="_blank"' : '' ;
            var rel='' ;
            if (nofollow) { rel +='nofollow ' ; }
            if (isExternal) { rel +='noopener' ; }
            #>
            <div class="swiper-slide">
              <div class="vdkg-slide">
                <# if ( link ) { #>
                  <a class="vdkg-slide__link" href="{{ link }}" {{{ target }}} rel="{{ rel }}">
                <# } #>
                <# if ( img ) { #>
                  <div class="vdkg-slide__image">
                    <img src="{{ img }}" alt="{{ title }}" />
                  </div>
                <# } #>
                <div class="vdkg-slide__content">
                  <# if ( title ) { #>
                    <span class="vdkg-slide__title">{{{ title }}}</span>
                  <# } #>
                  <# if ( text ) { #>
                    <span class="vdkg-slide__text">{{{ text }}}</span>
                  <# } #>
                </div>
                <# if ( link ) { #>
                  </a>
                <# } #>
              </div>
            </div>
            <# }); #>
        </div>

        <div class="vdkg-slider__nav">
          <button class="vdkg-slider__prev" type="button" aria-label="<?php echo $aria_prev; ?>">
            <# var prevIconHTML=elementor.helpers.renderIcon( view, settings.prev_icon, { 'aria-hidden' : true }, 'i' , 'object' ); #>
              <# if ( prevIconHTML && prevIconHTML.value ) { #>
                {{{ prevIconHTML.value }}}
                <# } #>
          </button>
          <button class="vdkg-slider__next" type="button" aria-label="<?php echo $aria_next; ?>">
            <# var nextIconHTML=elementor.helpers.renderIcon( view, settings.next_icon, { 'aria-hidden' : true }, 'i' , 'object' ); #>
              <# if ( nextIconHTML && nextIconHTML.value ) { #>
                {{{ nextIconHTML.value }}}
                <# } #>
          </button>
        </div>
      </div>
  <?php
  }
}
