<?php
function kimura_page_metabox( $meta_boxes ) {

	$kimura_prefix = '_kimura_';
	$meta_boxes[] = array(
		'id'        => 'page_single_metaboxs',
		'title'     => esc_html__( 'Page Header Options', 'kimura-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $kimura_prefix . 'header-background',
				'type'  => 'background',
				'name'  => esc_html__( 'Set The Header Background', 'kimura-companion' ),
			),
		),
	);
	$meta_boxes[] = array(
		'id'        => 'product_specifications',
		'title'     => esc_html__( 'Product Specifications', 'kimura-companion' ),
		'post_types'=> array( 'product' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $kimura_prefix . 'type',
				'type'  => 'text',
				'name'  => esc_html__( 'Type', 'kimura-companion' ),
				'placeholder' => esc_html__( 'EXCLUSIVE CAR', 'kimura-companion' ),
			),
			array(
				'id'    => $kimura_prefix . 'name',
				'type'  => 'text',
				'name'  => esc_html__( 'Name', 'kimura-companion' ),
				'placeholder' => esc_html__( '2ZR- 1NM-R859734 ACT M-54,268', 'kimura-companion' ),
			),
			array(
				'id'    => $kimura_prefix . 'year',
				'type'  => 'text',
				'name'  => esc_html__( 'Year', 'kimura-companion' ),
				'placeholder' => esc_html__( '2020', 'kimura-companion' ),
			),
			array(
				'id'    => $kimura_prefix . 'model',
				'type'  => 'text',
				'name'  => esc_html__( 'Model', 'kimura-companion' ),
				'placeholder' => esc_html__( 'Toyota Prius S 1800 CC', 'kimura-companion' ),
			),
			array(
				'id'    => $kimura_prefix . 'chassis_no',
				'type'  => 'text',
				'name'  => esc_html__( 'Chassis No', 'kimura-companion' ),
				'placeholder' => esc_html__( 'Toyota Prius S 1800 CC', 'kimura-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'kimura_page_metabox' );