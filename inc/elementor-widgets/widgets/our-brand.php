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
 * Kimura elementor brand section widget.
 *
 * @since 1.0
 */
class Kimura_Our_Brand extends Widget_Base {

	public function get_name() {
		return 'kimura-brands';
	}

	public function get_title() {
		return __( 'Brands', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Brand content ------------------------------
		$this->start_controls_section(
			'brand_content',
			[
				'label' => __( 'Brands content', 'kimura-companion' ),
			]
        );
        $this->add_control(
            'brand_inner_settings_seperator',
            [
                'label' => esc_html__( 'Brand Items', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'kimurabrands', [
                'label' => __( 'Create New', 'kimura-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ brand_title }}}',
                'fields' => [
                    [
                        'name' => 'brand_img',
                        'label' => __( 'Brand Image', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'brand_title',
                        'label' => __( 'Brand Title', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Brand 1', 'kimura-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'brand_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'brand_title'     => __( 'Brand 1', 'kimura-companion' ),
                    ],
                    [      
                        'brand_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'brand_title'     => __( 'Brand 2', 'kimura-companion' ),
                    ],
                    [      
                        'brand_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'brand_title'     => __( 'Brand 3', 'kimura-companion' ),
                    ],
                    [      
                        'brand_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'brand_title'     => __( 'Brand 4', 'kimura-companion' ),
                    ],
                    [      
                        'brand_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'brand_title'     => __( 'Brand 5', 'kimura-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

	}

	protected function render() {
    // load widget script
    $this->load_widget_script();
    $settings       = $this->get_settings();
    $kimurabrands = !empty( $settings['kimurabrands'] ) ? $settings['kimurabrands'] : '';
    $dynamic_class  = is_front_page() ? 'brand_area' : 'brand_area brand_area_position';
    ?>



    <!-- brand_area::start  -->
    <div class="<?=esc_attr($dynamic_class)?>">
        <div class="brand_warpper brand_active owl-carousel">
            <?php 
            if( is_array( $kimurabrands ) && count( $kimurabrands ) > 0 ) {
                foreach( $kimurabrands as $brand ) {
                    $brand_title = ( !empty( $brand['brand_title'] ) ) ? $brand['brand_title'] : '';
                    $brand_img   = !empty( $brand['brand_img']['id'] ) ? wp_get_attachment_image( $brand['brand_img']['id'], 'kimura_client_logo_thumb_175x50', '', array( 'alt' => $brand_title.' image' ) ) : '';
                    ?>
                    <div class="single_brand">
                        <?php echo $brand_img?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- brand_area::start  -->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // #######################
            //  brand_active
            // #######################
            if($('.brand_active').length){
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
                        items:1
                    },
                    767:{
                        items:3
                    },
                    992:{
                        items:4
                    },
                    1200:{
                        items:5
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