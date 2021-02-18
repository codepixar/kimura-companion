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
 * Kimura elementor testimonial section widget.
 *
 * @since 1.0
 */
class Kimura_Testimonial extends Widget_Base {

	public function get_name() {
		return 'kimura-testimonial';
	}

	public function get_title() {
		return __( 'Client Testimonials', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial content', 'kimura-companion' ),
			]
        );
        $this->add_control(
            'sub_title', [
                'label' => __( 'Sub Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Client testimonial', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'sec_title', [
                'label' => __( 'Section Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Clients Success Stories', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'testimonial_inner_settings_seperator',
            [
                'label' => esc_html__( 'Testimonial Items', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'testimonials', [
                'label' => __( 'Create New', 'kimura-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Robert Downey JR.', 'kimura-companion' ),
                    ],
                    [
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'kimura-companion'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'kimura-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'kimura-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'kimura-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'kimura-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'kimura-companion'),
				                'icon' => 'fa fa-star',
			                ],
		                ],
                        'default' => '5',
	                ],
                    [
                        'name' => 'client_review',
                        'label' => __( 'Client Review', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( '“Always think outside the box and the a embrace opportunities that appear offer outside the box and embr opportunities that appear they might be.”', 'kimura-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'client_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'     => __( 'Robert Downey JR.', 'kimura-companion' ),
                        'reviewstar'    => [
                            'title' => __('5', 'tourbi'),
                            'icon' => 'fa fa-star',
                        ],
                        'client_review'     => __( '“Always think outside the box and the a embrace opportunities that appear offer outside the box and embr opportunities that appear they might be.”', 'kimura-companion' ),
                    ],
                    [      
                        'client_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'     => __( 'Leonardo DiCaprio', 'kimura-companion' ),
                        'reviewstar'    => [
                            'title' => __('5', 'tourbi'),
                            'icon' => 'fa fa-star',
                        ],
                        'client_review'     => __( '“Always think outside the box and the a embrace opportunities that appear offer outside the box and embr opportunities that appear they might be.”', 'kimura-companion' ),
                    ],
                    [      
                        'client_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'     => __( 'Denzel Washington', 'kimura-companion' ),
                        'reviewstar'    => [
                            'title' => __('5', 'tourbi'),
                            'icon' => 'fa fa-star',
                        ],
                        'client_review'     => __( '“Always think outside the box and the a embrace opportunities that appear offer outside the box and embr opportunities that appear they might be.”', 'kimura-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Brand Section', 'kimura-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .section__title > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .section__title > h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'rev_name_col', [
                'label' => __( 'Reviewer Name Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .single_testmonial .testmonial_meta .testimonial_title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'stars_col', [
                'label' => __( 'Stars Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .single_testmonial .testmonial_meta .testimonial_title .star_rating i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'text_col', [
                'label' => __( 'Text Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .single_testmonial p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    // load widget script
    $this->load_widget_script();
    $settings     = $this->get_settings();
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $testimonials = !empty( $settings['testimonials'] ) ? $settings['testimonials'] : '';
    ?>

    <!-- testmonial_area::start  -->
    <div class="testmonial_area">
        <div class="row">
            <div class="col-12">
                <div class="section__title text-center mb_50">
                    <?php
                        if ( $sub_title ) {
                            echo '<span>'. esc_html($sub_title) . '</span>';
                        }
                        if ( $sec_title ) {
                            echo '<h3 class="mb-0">'. esc_html($sec_title) . '</h3>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="testmonial_wrapper d-flex align-items-center justify-content-center">
            <div class="testmonial_active testmonial_inner  owl-carousel">
                <?php 
                if( is_array( $testimonials ) && count( $testimonials ) > 0 ) {
                    foreach( $testimonials as $item ) {
                        $client_name = ( !empty( $item['client_name'] ) ) ? $item['client_name'] : '';
                        $client_img   = !empty( $item['client_img']['id'] ) ? wp_get_attachment_image( $item['client_img']['id'], 'kimura_client_img_thumb_80x80', '', array( 'alt' => $client_name.' image' ) ) : '';
                        $reviewstar = ( !empty( $item['reviewstar'] ) ) ? $item['reviewstar'] : '';
                        $client_review = ( !empty( $item['client_review'] ) ) ? $item['client_review'] : '';
                        ?>
                        <div class="single_testmonial">
                            <div class="testmonial_meta">
                                <?php
                                    if ( $client_img ) {
                                        echo '<div class="thumb">'. $client_img . '</div>';
                                    }
                                ?>
                                <div class="testimonial_title">
                                    <?php
                                        if ( $client_name ) {
                                            echo '<h4>'. esc_html($client_name) . '</h4>';
                                        }
                                        if (!empty( $reviewstar )) {
                                            echo '<div class="star_rating d-flex align-items-center">';
                                            for ($i = 1; $i <= 5; $i++) {
                
                                                if ($reviewstar >= $i) {
                                                    echo '<i class="fa fa-star"></i>';
                                                }
                                            }
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                                if ( $client_review ) {
                                    echo '<p>'. esc_html($client_review) . '</p>';
                                }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- testmonial_area::end  -->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // testmonial_active
            if($('.testmonial_active').length){
            $('.testmonial_active').owlCarousel({
                loop:true,
                margin:30,
                items:1,
                autoplay:true,
                navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                nav:false,
                dots:false,
                autoplayHoverPause: true,
                autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1
                    },
                    767:{
                        items:2
                    },
                    992:{
                        items:3
                    },
                    1200:{
                        items:3
                    }
                }
            });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }	
}