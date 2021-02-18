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
 * Kimura Counter Contents section widget.
 *
 * @since 1.0
 */
class Kimura_Counter_Section extends Widget_Base {

	public function get_name() {
		return 'kimura-counter-contents';
	}

	public function get_title() {
		return __( 'Counter Section', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Counter contents  ------------------------------
		$this->start_controls_section(
			'counter_content',
			[
				'label' => __( 'Partners Contents', 'kimura-companion' ),
			]
        );
        
		$this->add_control(
            'counter_contents', [
                'label' => __( 'Create New', 'kimura-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ counter_title }}}',
                'fields' => [
                    [
                        'name' => 'counter_title',
                        'label' => __( 'Counter Title', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Happy Client', 'kimura-companion' ),
                    ],
                    [
                        'name' => 'counter_value',
                        'label' => __( 'Counter Value', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '1', 'kimura-companion' ),
                    ],
                    [
                        'name' => 'counter_value_suffix',
                        'label' => __( 'Counter Value Suffix', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'M+', 'kimura-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'counter_title'         => __( 'Happy Client', 'kimura-companion' ),
                        'counter_value'         => __( '1', 'kimura-companion' ),
                        'counter_value_suffix'  => __( 'M+', 'kimura-companion' ),
                    ],
                    [
                        'counter_title'         => __( 'Successful products', 'kimura-companion' ),
                        'counter_value'         => __( '1200', 'kimura-companion' ),
                        'counter_value_suffix'  => __( '+', 'kimura-companion' ),
                    ],
                    [
                        'counter_title'         => __( 'Work Employed', 'kimura-companion' ),
                        'counter_value'         => __( '490', 'kimura-companion' ),
                        'counter_value_suffix'  => __( '+', 'kimura-companion' ),
                    ],
                    [
                        'counter_title'         => __( 'Years of journey', 'kimura-companion' ),
                        'counter_value'         => __( '25', 'kimura-companion' ),
                        'counter_value_suffix'  => __( '+', 'kimura-companion' ),
                    ],
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
            'color_counter_val', [
                'label'     => __( 'Counter Value Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_area .single_counter h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_counter_title', [
                'label'     => __( 'Counter Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_area .single_counter p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        
	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings          = $this->get_settings();
    $counter_contents  = !empty( $settings['counter_contents'] ) ? $settings['counter_contents'] : '';
    ?>

    <!-- counter_area::start  -->
    <div class="counter_area">
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $counter_contents ) && count( $counter_contents ) > 0 ){
                    foreach ( $counter_contents as $counter ) {
                        $counter_title        = !empty( $counter['counter_title'] ) ? $counter['counter_title'] : '';
                        $counter_value        = !empty( $counter['counter_value'] ) ? $counter['counter_value'] : '';
                        $counter_value_suffix = !empty( $counter['counter_value_suffix'] ) ? $counter['counter_value_suffix'] : '';
                        ?>
                        <div class="col-lg-3">
                            <div class="single_counter">
                                <h3><span class="counter"><?=esc_html($counter_value)?></span><span><?=esc_html($counter_value_suffix)?></span></h3>
                                <p><?=esc_html($counter_title)?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // counter 
            $('.counter').counterUp({
            delay: 10,
            time: 10000
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
