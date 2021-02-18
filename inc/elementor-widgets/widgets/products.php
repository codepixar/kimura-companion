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
 * Kimura elementor product section widget.
 *
 * @since 1.0
 */
class Kimura_Products extends Widget_Base {

	public function get_name() {
		return 'kimura-products';
	}

	public function get_title() {
		return __( 'All Products', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Product content ------------------------------
		$this->start_controls_section(
			'product_content',
			[
				'label' => __( 'Products Settings', 'kimura-companion' ),
			]
        );
        $this->add_control(
            'products_count',
            [
                'label' => esc_html__( 'Products Count', 'kimura-companion' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
            ]
        );
		$this->end_controls_section(); // End right project content

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
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'kimura-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'product_title_col', [
                'label' => __( 'Product Title Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product_area .single_product .product_content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'product_title_hover_col', [
                'label' => __( 'Product Title Hover Color', 'kimura-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product_area .single_product .product_content h4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
    $settings       = $this->get_settings();
    $products_count = !empty( $settings['products_count'] ) ? $settings['products_count'] : '';
    ?>
    <!-- product_area::start  -->
    <div class="product_area">
        <div class="container">
            <div class="row">
                <?php kimura_get_products_navs()?>
                <?php kimura_get_product_contents( $products_count )?>
            </div>
        </div>
    </div>
    <?php
    }
}