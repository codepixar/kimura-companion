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
 * Kimura Review Contents section widget.
 *
 * @since 1.0
 */
class Kimura_Review_Contents extends Widget_Base {

	public function get_name() {
		return 'kimura-review-contents';
	}

	public function get_title() {
		return __( 'Our Partners', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Review contents  ------------------------------
		$this->start_controls_section(
			'reviews_content',
			[
				'label' => __( 'Partners Contents', 'kimura-companion' ),
			]
        );
        
		$this->add_control(
            'reviews_contents', [
                'label' => __( 'Create New', 'kimura-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ reviewer_name }}}',
                'fields' => [
                    [
                        'name' => 'client_logo',
                        'label' => __( 'Client Logo', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'reviewer_name',
                        'label' => __( 'Reviewer Name', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Iconic', 'kimura-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( 'Iconic', 'kimura-companion' ),
                    ],
                    [
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( 'Birden', 'kimura-companion' ),
                    ],
                    [
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( 'Echa', 'kimura-companion' ),
                    ],
                    [
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( 'Urban', 'kimura-companion' ),
                    ],
                    [
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( 'Natural', 'kimura-companion' ),
                    ],
                    [
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'reviewer_name'         => __( 'Nostn', 'kimura-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings = $this->get_settings();
    $reviews  = !empty( $settings['reviews_contents'] ) ? $settings['reviews_contents'] : '';
    ?>

    <div class="brand_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_active owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ( $reviews as $review ) {
                                $reviewer_name = !empty( $review['reviewer_name'] ) ? $review['reviewer_name'] : '';
                                $client_logo   = !empty( $review['client_logo']['id'] ) ? wp_get_attachment_image( $review['client_logo']['id'], 'kimura_client_logo_166x100', '', array('alt' => $reviewer_name . ' image' ) ) : '';
                                ?>
                                <div class="single_brand">
                                    <?php
                                        if ( $client_logo ) {
                                            echo $client_logo;
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
        </div>
    </div>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $('.brand_active').owlCarousel({
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
                    items:2
                },
                767:{
                    items:4
                },
                992:{
                    items:5
                },
                1200:{
                    items:6
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
