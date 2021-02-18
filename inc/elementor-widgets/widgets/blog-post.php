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
 * Kimura elementor blog post section widget.
 *
 * @since 1.0
 */
class Kimura_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'kimura-blog-post';
	}

	public function get_title() {
		return __( 'Blog Posts', 'kimura-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'kimura-elements' ];
    }

	protected function _register_controls() {

        // ----------------------------------------  Blog Post content ------------------------------
        $this->start_controls_section(
            'blog_post_content',
            [
                'label' => __( 'Blog Post Content', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'News and events', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'kimura-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Get The Latest Insights', 'kimura-companion' ),
            ]
        );
        $this->add_control(
            'post_count',
            [
                'label' => esc_html__( 'Post Count', 'kimura-companion' ),
                'type' => Controls_Manager::NUMBER,
                'default'   => esc_html__( '3', 'kimura-companion' ),
            ]
        );
        
        $this->end_controls_section(); // End Blog Post content


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
                    '{{WRAPPER}} .blog_area .section__title > span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Big Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_area .section__title > h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blog_post_title', [
                'label'     => __( 'Blog Post Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_area .single_blog .blog_meta h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();  
        
        

    }
    
	protected function render() {
    $settings     = $this->get_settings(); 
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $post_count   = !empty( $settings['post_count'] ) ? absint($settings['post_count']) : '';
    ?>

    <!-- blog_area::start  -->
    <div class="blog_area">
        <div class="container">
            <?php
            if ( $sub_title || $sec_title ) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="section__title mb_50 text-center">
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
                <?php
            }
            ?>
            <div class="row">
                <?php
                    if( function_exists( 'kimura_blog_posts' ) ) {
                        kimura_blog_posts( $post_count );
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- blog_area::end -->
    <?php
    }
}