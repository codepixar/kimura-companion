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
 * Kimura elementor service section widget.
 *
 * @since 1.0
 */
class Kimura_Service_Section extends Widget_Base {

	public function get_name() {
		return 'kimura-service-section';
	}

	public function get_title() {
		return __( 'Service Section', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Service content', 'kimura-companion' ),
			]
        );
        
		$this->add_control(
            'service_img', [
                'label' => __( 'Service Image', 'kimura-companion' ),
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
                'default' => __( 'Business Objectives', 'kimura-companion' ),
            ]
        );
		$this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Gradually kept its consistent growth with innovative ideas and the Leadership.', 'kimura-companion' ),
            ]
        );
		$this->add_control(
            'sec_txt', [
                'label' => __( 'Section Text', 'kimura-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => '<ul class="service_lists"><li><p>Participating in the socio-economic development of the country.</p></li><li><p>Providing humanitarian services.</p></li><li><p>Making HNS a role model for the young entrepreneurs.</p></li><li><p>Creating job opportunities.</p></li></ul>',
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
                    '{{WRAPPER}} .service_area .section__title > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Big Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .section__title > h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_text', [
                'label'     => __( 'Text Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_area .service_info .service_lists li p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .service_area .service_info .service_lists li::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
	}
    
	protected function render() {
	$settings    = $this->get_settings();  
    $sub_title   = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sec_txt     = !empty( $settings['sec_txt'] ) ? $settings['sec_txt'] : '';
    $service_img = !empty( $settings['service_img']['id'] ) ? wp_get_attachment_image( $settings['service_img']['id'], 'kimura_service_thumb_400x480', '', array('alt' => $sub_title.' image' ) ) : '';
	?>
    
    <!-- service_area::start  -->
    <div class="service_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="service_info mb_30">
                        <div class="section__title mb_25">
                            <?php
                                if ( $sub_title ) {
                                    echo '<span>'. esc_html($sub_title) . '</span>';
                                }
                                if ( $sec_title ) {
                                    echo '<h3 class="mb-0">'. esc_html($sec_title) . '</h3>';
                                }
                            ?>
                        </div>
                        <?php
                            if ( $sec_txt ) {
                                echo wp_kses_post(nl2br($sec_txt));
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <?php
                        if ( $service_img ) {
                            echo '<div class="thumb mb_30">'.$service_img.'</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area::end  -->
    <?php
	}  
	
}