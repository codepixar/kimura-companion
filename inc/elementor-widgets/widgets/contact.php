<?php
namespace Kimuraelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * kimura elementor about page section widget.
 *
 * @since 1.0
 */
class Kimura_Contact extends Widget_Base {

    public function get_name() {
        return 'kimura-contact';
    }

    public function get_title() {
        return __( 'Contact', 'kimura-companion' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'kimura-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Contact Info', 'kimura-companion' ),
            ]
        );

        $this->add_control(
            'info', [
                'label'         => __( 'Create Contact Info', 'kimura-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ office_title }}}',
                'fields'  => [
                    [
                        'name'        => 'office_title',
                        'label'       => __( 'Office Location', 'kimura-companion' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Japan Office', 'kimura-companion' )
                    ],
                    [
                        'name'    => 'office_desc',
                        'label'   => __( 'Contact Descriptions', 'kimura-companion' ),
                        'type'    => Controls_Manager::TEXTAREA,
                        'default' => '<p>Email: Kaimura.alam1900@gmail.com <br>kaimurashokao01ltd@gmail.com <br>Phone: 06-6387-1281, +819019004150 <br>Fax: 06-6387-1169</p>
                        <p>1-41-32, Tarumi-cho, Suite-city Osaka, 564-0062 T</p>',
                    ],

                ],
                'default'   => [
                    [
                        'office_title' => esc_html__( 'Japan Office', 'kimura-companion'),
                        'office_desc'  => '<p>Email: Kaimura.alam1900@gmail.com <br>kaimurashokao01ltd@gmail.com <br>Phone: 06-6387-1281, +819019004150 <br>Fax: 06-6387-1169</p>
                        <p>1-41-32, Tarumi-cho, Suite-city Osaka, 564-0062 T</p>',
                    ],                 
                    [
                        'office_title' => esc_html__( 'NewYork Office', 'kimura-companion'),
                        'office_desc'  => '<p>Email: Kaimura.alam1900@gmail.com <br>kaimurashokao01ltd@gmail.com <br>Phone: 06-6387-1281, +819019004150 <br>Fax: 06-6387-1169</p>
                        <p>1-41-32, Tarumi-cho, Suite-city Osaka, 564-0062 T</p>',
                    ],                 
                ]
            ]
        );

        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'kimura-companion' ),
            ]
        );

        $this->add_control(
            'contact_form_title',
            [
                'label'     => esc_html__( 'Contact Form Title', 'kimura-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Get in Touch', 'kimura-companion')
            ]
        );
        $this->add_control(
            'contact_form_sub_title',
            [
                'label'     => esc_html__( 'Contact Form Title', 'kimura-companion' ),
                'type'      => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__('Your email address will not be published *', 'kimura-companion')
            ]
        );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'kimura-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Contact Form


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_left_content_color', [
                'label' => __( 'Style Left Content Color', 'kimura-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_section .contact_address .contact__title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_sub_title', [
                'label'     => __( 'Sub Title Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_section .contact_address .contact__title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
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
                    '{{WRAPPER}} .contact_section .contact_address .theme_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btn_bg', [
                'label'     => __( 'Button Bg Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_section .contact_address .theme_btn' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .contact_section .contact_address .theme_btn:hover' => 'color: {{VALUE}}; border-color: {{VALUE}}; background: transparent',
                ],
            ]
        );

        $this->end_controls_section();

        // Right content styles
        $this->start_controls_section(
            'style_right_content_color', [
                'label' => __( 'Style Right Content Color', 'kimura-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_location', [
                'label'     => __( 'Office Location Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_section .contact_details_info .single_contact_details h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_address_details', [
                'label'     => __( 'Address Details Color', 'kimura-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact_section .contact_details_info .single_contact_details p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['contact_form_title'] ) ? $settings['contact_form_title'] : '';
    $sub_title = !empty( $settings['contact_form_sub_title'] ) ? $settings['contact_form_sub_title'] : '';
    $form_shortcode = !empty( $settings['contact_formshortcode'] ) ? $settings['contact_formshortcode'] : '';
    $info = !empty( $settings['info'] ) ? $settings['info'] : '';
    ?>

    <!-- CONTACT::START  -->
    <div class="contact_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="contact_address">
                        <div class="row">
                            <div class="col-lg-8 col-xl-8">
                                <div class="contact__title">
                                    <?php
                                        if( $sec_title ) {
                                            echo '<h3>' . esc_html( $sec_title ) . '</h3>';
                                        }
                                        if( $sub_title ) {
                                            echo '<p>' . esc_html( $sub_title ) . '</p>';
                                        }
                                    ?>
                                </div>

                                <?php
                                    if( $form_shortcode ) {
                                        echo do_shortcode( $form_shortcode );
                                    }
                                ?>
                            </div>

                            <div class="col-lg-4 col-xl-4">
                                <div class="contact_details_info">
                                    <?php 
                                    if( is_array( $info ) && count( $info ) > 0 ) {
                                        foreach( $info as $item ) {
                                        $office_title = ( !empty( $item['office_title'] ) ) ? $item['office_title'] : '';
                                        $office_desc = ( !empty( $item['office_desc'] ) ) ? $item['office_desc'] : '';
                                        ?>
                                        <div class="single_contact_details">
                                            <?php
                                                if( $office_title ) {
                                                    echo '<h4>' . esc_html( $office_title ) . '</h4>';
                                                }
                                                if( $office_desc ) {
                                                    echo wp_kses_post( nl2br($office_desc) );
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
            </div>
        </div>
    </div>

    <?php
    }
}