<?php
namespace Kimuraelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Kimura elementor cta section widget.
 *
 * @since 1.0
 */
class Kimura_CTA_Section extends Widget_Base {

	public function get_name() {
		return 'kimura-cta-section';
	}

	public function get_title() {
		return __( 'CTA Section', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  cta content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'CTA content', 'kimura-companion' ),
			]
        );
        
		$this->add_control(
            'bg_img', [
                'label' => __( 'BG Image', 'kimura-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
		$this->add_control(
            'sub_title', [
                'label' => __( 'Sub Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Are You looking for a car?', 'kimura-companion' ),
            ]
        );
		$this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Our cars are delivered fully-registered with all requirements completed.', 'kimura-companion' ),
            ]
        );
		$this->add_control(
            'btn_text', [
                'label' => __( 'Button Text', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Buy Car Now', 'kimura-companion' ),
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
                    '{{WRAPPER}} .cta_area .section__title.white_text span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Big Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_area .section__title.white_text h3' => 'color: {{VALUE}};',
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
            'color_btn_text', [
                'label'     => __( 'Button Text Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_area .cta_text .theme_btn2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btn_bg', [
                'label'     => __( 'Button Bg Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_area .cta_text .theme_btn2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cta_area .cta_text .theme_btn2:hover' => 'border-color: {{VALUE}}; color: {{VALUE}}; background: transparent;',
                ],
            ]
        );

        $this->end_controls_section();        
                
	}
    
	protected function render() {
	$settings  = $this->get_settings(); 
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $btn_text  = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
    $btn_url   = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
	?>

    <!-- cta_area::start  -->
    <div class="cta_area" <?php echo kimura_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta_text text-center">
                        <div class="section__title white_text mb_40 text-center">
                            <?php
                                if ( $sub_title ) {
                                    echo '<span>'. esc_html($sub_title) . '</span>';
                                }
                                if ( $sec_title ) {
                                    echo '<h3>'. esc_html($sec_title) . '</h3>';
                                }
                            ?>
                        </div>
                        <?php
                            if ( $btn_text ) {
                                echo '<a href="'.esc_url($btn_url).'" class="theme_btn2">'. esc_html($btn_text) . '</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta_area::end  -->
    <?php
	}  
	
}