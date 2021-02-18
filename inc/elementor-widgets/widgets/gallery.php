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
 * Kimura elementor gallery section widget.
 *
 * @since 1.0
 */
class Kimura_Gallery extends Widget_Base {

	public function get_name() {
		return 'kimura-gallery';
	}

	public function get_title() {
		return __( 'Gallery Section', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery content', 'kimura-companion' ),
			]
        );
        $this->add_control(
            'gallery_inner_settings_seperator',
            [
                'label' => esc_html__( 'Gallery Items', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'galleries', [
                'label' => __( 'Create New', 'kimura-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ tab_title }}}',
                'fields' => [
                    [
                        'name' => 'tab_title',
                        'label' => __( 'Left Tab Title', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Agreement Signing', 'kimura-companion' ),
                    ],
                    [
                        'name' => 'right_section_title',
                        'label' => __( 'Right Section Title', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                    ],
                    [
                        'name' => 'right_section_text',
                        'label' => __( 'Right Section Text', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                    ],
                    [
                        'name' => 'gallery_img1',
                        'label' => __( 'Gallery Image 1', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'gallery_img2',
                        'label' => __( 'Gallery Image 2', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'gallery_img3',
                        'label' => __( 'Gallery Image 3', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'gallery_img4',
                        'label' => __( 'Gallery Image 4', 'kimura-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'tab_title'           => __( 'Agreement  Signing', 'kimura-companion' ),
                        'right_section_title' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                        'right_section_text'  => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                        'gallery_img1'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img2'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img3'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img4'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'tab_title'           => __( 'Korean delegations', 'kimura-companion' ),
                        'right_section_title' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                        'right_section_text'  => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                        'gallery_img1'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img2'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img3'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img4'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'tab_title'           => __( 'Foreign Delegates', 'kimura-companion' ),
                        'right_section_title' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                        'right_section_text'  => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                        'gallery_img1'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img2'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img3'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img4'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'tab_title'           => __( 'Hankook Conference', 'kimura-companion' ),
                        'right_section_title' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                        'right_section_text'  => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                        'gallery_img1'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img2'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img3'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img4'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'tab_title'           => __( 'SK -ZIC lubricants', 'kimura-companion' ),
                        'right_section_title' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                        'right_section_text'  => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                        'gallery_img1'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img2'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img3'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img4'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'tab_title'           => __( 'Iftar Mehfil 2020', 'kimura-companion' ),
                        'right_section_title' => __( 'Distributorship Agreement  Signing Ceremony with Hyundai.', 'kimura-companion' ),
                        'right_section_text'  => __( 'Cras mattis iudicium purus sit amet fermentum at nosposthac sitientis piros afros. Lorem ipsum dolor amet, consectetur is adipisici eliterunt uti sibi concilium.', 'kimura-companion' ),
                        'gallery_img1'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img2'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img3'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_img4'        => [
                            'url'             => Utils::get_placeholder_image_src(),
                        ],
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
        'style_product_section', [
            'label' => __( 'Style Product Section', 'kimura-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'left_tab_text_col', [
            'label' => __( 'Left Tab Title Color', 'kimura-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .theme_tabs li a' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'left_tab_bg_col', [
            'label' => __( 'Left Tab Bg Color', 'kimura-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .theme_tabs li a.active, .theme_tabs li a:hover' => 'background: {{VALUE}}; border-color: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'right_content_styles_seperator',
        [
            'label' => esc_html__( 'Right Content Styles', 'kimura-companion' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after'
        ]
    );
    $this->add_control(
        'title_col', [
            'label' => __( 'Title Color', 'kimura-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .gallery_wrapper h3' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'text_col', [
            'label' => __( 'Text Color', 'kimura-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .gallery_wrapper p' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

	}

    public function get_gallery_img_wrap( $gallery_img ) {
        ?>
        <div class="col-lg-6 col-md-6">
            <div class="single_gallery mb_30">
                <div class="thumb">
                    <?php echo $gallery_img?>
                </div>
            </div>
        </div>
        <?php
    }

	protected function render() {
    $settings  = $this->get_settings();
    $galleries = !empty( $settings['galleries'] ) ? $settings['galleries'] : '';
    $i = 0;
    ?>
    
    <!-- gallery_area::start  -->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <ul class="nav theme_tabs mb_30" id="myTab" role="tablist">
                        <?php 
                        if( is_array( $galleries ) && count( $galleries ) > 0 ) {
                            foreach( $galleries as $item ) {
                                $i++;
                                $tab_id = ( !empty( $item['_id'] ) ) ? $item['_id'] : '';
                                $tab_title = ( !empty( $item['tab_title'] ) ) ? $item['tab_title'] : '';
                                $active_class = ($i == 1) ? ' active' : '';
                                $area_selected_class = ($i == 1) ? 'true' : 'false';
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link<?=esc_attr($active_class)?>" id="<?=esc_attr($tab_id)?>-tab" data-toggle="tab" href="#<?=esc_attr($tab_id)?>" role="tab" aria-controls="<?=esc_attr($tab_id)?>" aria-selected="<?=esc_attr($area_selected_class)?>"><?=esc_attr($tab_title)?></a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="tab-content" id="myTabContent">
                        <?php 
                        $i = 0;
                        if( is_array( $galleries ) && count( $galleries ) > 0 ) {
                            foreach( $galleries as $item ) {
                                $i++;
                                $tab_id = ( !empty( $item['_id'] ) ) ? $item['_id'] : '';
                                $right_section_title = ( !empty( $item['right_section_title'] ) ) ? $item['right_section_title'] : '';
                                $right_section_text = ( !empty( $item['right_section_text'] ) ) ? $item['right_section_text'] : '';
                                $gallery_img1   = !empty( $item['gallery_img1']['id'] ) ? wp_get_attachment_image( $item['gallery_img1']['id'], 'kimura_gallery_thumb_420x340', '', array( 'alt' => $right_section_title.' image 1' ) ) : '';
                                $gallery_img2   = !empty( $item['gallery_img2']['id'] ) ? wp_get_attachment_image( $item['gallery_img2']['id'], 'kimura_gallery_thumb_420x340', '', array( 'alt' => $right_section_title.' image 2' ) ) : '';
                                $gallery_img3   = !empty( $item['gallery_img3']['id'] ) ? wp_get_attachment_image( $item['gallery_img3']['id'], 'kimura_gallery_thumb_420x340', '', array( 'alt' => $right_section_title.' image 3' ) ) : '';
                                $gallery_img4   = !empty( $item['gallery_img4']['id'] ) ? wp_get_attachment_image( $item['gallery_img4']['id'], 'kimura_gallery_thumb_420x340', '', array( 'alt' => $right_section_title.' image 4' ) ) : '';
                                $dynamic_active_class = ($i == 1) ? ' show active' : '';
                                ?>
                                <div class="tab-pane fade<?=esc_attr($dynamic_active_class)?>" id="<?=esc_attr($tab_id)?>" role="tabpanel" aria-labelledby="<?=esc_attr($tab_id)?>-tab">
                                    <!-- content  -->
                                    <div class="gallery_wrapper">
                                        <?php
                                            if ( $right_section_title ) {
                                                echo '<h3>'. esc_html($right_section_title) . '</h3>';
                                            }
                                            if ( $right_section_text ) {
                                                echo '<p>'. esc_html($right_section_text) . '</p>';
                                            }
                                        ?>
                                        <div class="row">
                                            <?php
                                                if ( $gallery_img1 ) {
                                                    $this->get_gallery_img_wrap( $gallery_img1 );
                                                }
                                                if ( $gallery_img2 ) {
                                                    $this->get_gallery_img_wrap( $gallery_img2 );
                                                }
                                                if ( $gallery_img3 ) {
                                                    $this->get_gallery_img_wrap( $gallery_img3 );
                                                }
                                                if ( $gallery_img4 ) {
                                                    $this->get_gallery_img_wrap( $gallery_img4 );
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <!--/ content  -->
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
    <!-- gallery_area::end  -->
    <?php
    }
}