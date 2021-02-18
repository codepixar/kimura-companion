<?php
namespace Kimuraelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Kimura elementor hero section section widget.
 *
 * @since 1.0
 */
class Kimura_Hero_Section extends Widget_Base {

	public function get_name() {
		return 'kimura-hero-section';
	}

	public function get_title() {
		return __( 'Hero Section', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Hero Section ------------------------------
        $this->start_controls_section(
            'hero_section_content',
            [
                'label' => __( 'Banner Section', 'kimura-companion' ),
            ]
        );     
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'kimura-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'WELCOME TO HNS Group', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'aking HNS a Role Model For Entrepreneurs.', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'More Details', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'kimura-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->end_controls_section(); // End hero_section
        
        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'kimura-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sub_title', [
                'label'     => __( 'Sub Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_area .banner_text span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Big Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_area .banner_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'color_button_txt', [
                'label'     => __( 'Button Text Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_area .banner_text .theme_btn2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_button_bg', [
                'label'     => __( 'Button BG Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_area .banner_text .theme_btn2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .banner_area .banner_text .theme_btn2:hover' => 'border-color: {{VALUE}}; color: {{VALUE}}; background: transparent',
                ],
            ]
        );
        
        $this->end_controls_section();
	}

	protected function render() {
    $settings      = $this->get_settings();
    $bg_img        = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sub_title     = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title     = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $btn_title     = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url       = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    $mouse_img_url = KIMURA_DIR_IMGS_URI . 'mouse.svg';
    ?>

    <!-- BANNER::START  -->
    <div class="banner_area" <?php echo kimura_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row" >
                <div class="col-lg-12">
                    <div class="banner_text">
                        <?php
                            if ( $sub_title ) {
                                echo '<span>'.esc_html($sub_title).'</span>';
                            }
                            if ( $sec_title ) {
                                echo '<h3>'.esc_html($sec_title).'</h3>';
                            }
                            if ( $btn_title ) {
                                echo '<a href="'.esc_url($btn_url).'" class="theme_btn2">'.esc_html($btn_title).'</a>';
                            }
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll_down_controller">
            <div class="mouse_icon">
                <img src="<?=esc_url($mouse_img_url)?>" alt="mouse icon">
            </div>
            <span><?php _e('Scroll Down', 'kimura-companion')?></span>
        </div>
    </div>
    <!-- BANNER::END  -->
    <?php

    }
}
