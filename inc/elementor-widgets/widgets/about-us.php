<?php
namespace Kimuraelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Kimura elementor about us section widget.
 *
 * @since 1.0
 */
class Kimura_About_Us extends Widget_Base {

	public function get_name() {
		return 'kimura-about-us';
	}

	public function get_title() {
		return __( 'About Us', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  about us content ------------------------------
		$this->start_controls_section(
			'about_us_content',
			[
				'label' => __( 'About Us content', 'kimura-companion' ),
			]
        );
        
		$this->add_control(
            'style_type', [
                'label' => __( 'Select Style', 'kimura-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style 1', 'kimura-companion' ),
                    'style2' => __( 'Style 2', 'kimura-companion' ),
                ]
            ]
        );
		$this->add_control(
            'about_img_1', [
                'label' => __( 'About Image 1', 'kimura-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
		$this->add_control(
            'about_img_2', [
                'label' => __( 'About Image 2', 'kimura-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
		$this->add_control(
            'sub_title', [
                'label' => __( 'Section Sub Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'WELCOME TO HNS Group', 'kimura-companion' ),
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
		$this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Participating in the socio economic development of the country.', 'kimura-companion' ),
            ]
        );
		$this->add_control(
            'sec_txt', [
                'label' => __( 'Section Text', 'kimura-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Duis aute irure dolor reprehenderit  voluptate velit esse cillum dolore eu fugiatnulla xcepteur sint aecat cupidatat nones proide suntin culpa qui officiat mollit anim idestborum. Sedutes perspiciatis unde omnis iste natus error sitluptatem  enim ad minim.', 'kimura-companion' ),
            ]
        );
		$this->add_control(
            'btn_title', [
                'label' => __( 'Button Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'More About Us', 'kimura-companion' ),
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
		$this->add_control(
            'btn_url', [
                'label' => __( 'Button URL', 'kimura-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
        
        $this->end_controls_section(); // End Hero content

        
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
                    '{{WRAPPER}} .about_area .section__title > span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Big Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .section__title > h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area_wrapper .about_wapper_inner .single_about_info h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_text', [
                'label'     => __( 'Text Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_wrapper_inner .about_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area_wrapper .about_wapper_inner .single_about_info p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
        $this->add_control(
            'color_btn_text', [
                'label'     => __( 'Button Text Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_wrapper_inner .about_info .theme_btn' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
        $this->add_control(
            'color_btn_bg', [
                'label'     => __( 'Button Bg Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_wrapper_inner .about_info .theme_btn' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .about_wrapper_inner .about_info .theme_btn:hover' => 'border-color: {{VALUE}}; color: {{VALUE}}; background: transparent;',
                ],
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );

        // Bg shade
        $this->add_control(
            'shade_img_styles_seperator',
            [
                'label' => esc_html__( 'Shade Image', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'shade_image',
                'label' => __( 'Background', 'beko' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .about_area .about_thumb::before',
                'condition' => [
                    'style_type' => 'style1'
                ]
            ]
        );

        $this->end_controls_section();

	}
    
	protected function render() {
	$settings    = $this->get_settings();  
    $style_type  = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    $sub_title   = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sec_txt     = !empty( $settings['sec_txt'] ) ? $settings['sec_txt'] : '';
    $btn_title   = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url     = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';

    if ( $style_type == 'style1' ) {
        $about_img_1 = !empty( $settings['about_img_1']['id'] ) ? wp_get_attachment_image( $settings['about_img_1']['id'], 'kimura_about_thumb_285x350', '', array('alt' => $sub_title.' image 1' ) ) : '';
        $about_img_2 = !empty( $settings['about_img_2']['id'] ) ? wp_get_attachment_image( $settings['about_img_2']['id'], 'kimura_about_thumb_285x350', '', array('alt' => $sub_title.' image 2' ) ) : '';
	?>
	
        <!-- ABOUT::START  -->
        <div class="about_area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="about_thumb">
                            <?php
                                if ( $about_img_1 ) {
                                    echo '<div class="thumb">'. $about_img_1 . '</div>';
                                }
                                if ( $about_img_2 ) {
                                    echo '<div class="thumb thumb2">'. $about_img_2 . '</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="about_wrapper">
                            <div class="section__title mb_30">
                                <?php
                                    if ( $sub_title ) {
                                        echo '<span>'.esc_html($sub_title).'</span>';
                                    }
                                    if ( $sec_title ) {
                                        echo '<h3 class="mb-0">'.esc_html($sec_title).'</h3>';
                                    }
                                ?>
                            </div>
                            <div class="about_wrapper_inner">
                                <div class="about_info">
                                    <?php
                                        if ( $sec_txt ) {
                                            echo '<p class="mb_35">'.esc_html($sec_txt).'</p>';
                                        }
                                        if ( $btn_title ) {
                                            echo '<a href="'.esc_url($btn_url).'" class="theme_btn">'.esc_html($btn_title).'</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        $about_img_1 = !empty( $settings['about_img_1']['id'] ) ? wp_get_attachment_image( $settings['about_img_1']['id'], 'kimura_about_thumb_400x520', '', array('alt' => $sec_title.' image 1' ) ) : '';
        $about_img_2 = !empty( $settings['about_img_2']['id'] ) ? wp_get_attachment_image( $settings['about_img_2']['id'], 'kimura_about_thumb_400x520', '', array('alt' => $sec_title.' image 2' ) ) : '';
        ?>
        <!-- about_area_wrapper::start  -->
        <div class="about_area_wrapper">
            <div class="container">
                <div class="about_wapper_inner">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-lg-6 mb_30 col-md-6">
                                    <div class="single_about_info">
                                        <?php
                                            if ( $sec_title ) {
                                                echo '<h4>'.esc_html($sec_title).'</h4>';
                                            }
                                            if ( $sec_txt ) {
                                                echo '<p class="mb_50">'.esc_html($sec_txt).'</p>';
                                            }
                                            if ( $about_img_1 ) {
                                                echo '<div class="thumb">'.$about_img_1.'</div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb_30 col-md-6">
                                    <div class="single_about_info">
                                        <?php
                                            if ( $about_img_2 ) {
                                                echo '<div class="thumb mb_50">'.$about_img_2.'</div>';
                                            }
                                            if ( $sec_title ) {
                                                echo '<h4>'.esc_html($sec_title).'</h4>';
                                            }
                                            if ( $sec_txt ) {
                                                echo '<p>'.esc_html($sec_txt).'</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT::END  -->
        <?php
    }
	}  
	
}