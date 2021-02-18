<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge       : Kimura Companion
 * @Version      : 1.0
 * @Author       : Spondonit
 * @Author URI 	 : https://spondonit.com
 *
 */

// Section Heading
function kimura_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}




/*================================================
    Kimura Custom Posts
================================================*/
function kimura_custom_posts() {
	
	// Product Custom Post Type
	
	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'kimura-companion' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'kimura-companion' ),
		'menu_name'          => _x( 'Kim. Products', 'admin menu', 'kimura-companion' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'kimura-companion' ),
		'add_new'            => _x( 'Add New', 'product', 'kimura-companion' ),
		'add_new_item'       => __( 'Add New', 'kimura-companion' ),
		'new_item'           => __( 'New Product', 'kimura-companion' ),
		'edit_item'          => __( 'Edit Product', 'kimura-companion' ),
		'view_item'          => __( 'View Product', 'kimura-companion' ),
		'all_items'          => __( 'All Products', 'kimura-companion' ),
		'search_items'       => __( 'Search Products', 'kimura-companion' ),
		'parent_item_colon'  => __( 'Parent Products:', 'kimura-companion' ),
		'not_found'          => __( 'No products found.', 'kimura-companion' ),
		'not_found_in_trash' => __( 'No products found in Trash.', 'kimura-companion' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'kimura-companion' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-car',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'product', $args );


	// Product category
	$labels = array(
		'name'              => _x( 'Product Category', 'taxonomy general name', 'kimura-companion' ),
		'singular_name'     => _x( 'Product Categories', 'taxonomy singular name', 'kimura-companion' ),
		'search_items'      => __( 'Search Product Categories', 'kimura-companion' ),
		'all_items'         => __( 'All Product Categories', 'kimura-companion' ),
		'parent_item'       => __( 'Parent Product Category', 'kimura-companion' ),
		'parent_item_colon' => __( 'Parent Product Category:', 'kimura-companion' ),
		'edit_item'         => __( 'Edit Product Category', 'kimura-companion' ),
		'update_item'       => __( 'Update Product Category', 'kimura-companion' ),
		'add_new_item'      => __( 'Add New Product Category', 'kimura-companion' ),
		'new_item_name'     => __( 'New Product Category Name', 'kimura-companion' ),
		'menu_name'         => __( 'Product Category', 'kimura-companion' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'product-cat' ),
	);

	register_taxonomy( 'product-cat', array( 'product' ), $args );

}
add_action( 'init', 'kimura_custom_posts' );



/*=========================================================
    Products navs
========================================================*/
function kimura_get_products_navs(){ 
	$product_cats = get_terms(
		'product-cat',
		[
			'orderby'  => 'count',
			'order'    => 'DESC'
		]
	);
	$i = 1;
	?>
	<div class="col-xl-3 col-lg-4">
		<ul class="nav theme_tabs mb_30" id="myTab" role="tablist">
			<?php
				foreach( $product_cats as $cat ) {
					$nav_link_class_dynamic 	 = esc_attr($i==1?' active':'');
					$area_selected_class_dynamic = esc_attr($i==1?'true':'false');
					echo "
					<li class='nav-item'>
						<a class='nav-link{$nav_link_class_dynamic}' id='{$cat->slug}-tab' data-toggle='tab' href='#{$cat->slug}' role='tab' aria-controls='{$cat->slug}' aria-selected='{$area_selected_class_dynamic}'>{$cat->name}</a>
					</li>";
					$i++;
				}
			?>
		</ul>
	</div>
	<?php
}


/*=========================================================
    Product Tab Content Section
========================================================*/
function kimura_get_product_contents( $pNumber = 4 ){ 
	$i = 1;
	?>
	<div class="col-xl-8 col-lg-8">
		<div class="tab-content" id="myTabContent">
			<?php
			$product_cats = get_terms(
				'product-cat',
				[
					'orderby'  => 'count',
					'order'    => 'DESC'
				]
			);
			if( $product_cats ) {
				foreach( $product_cats as $cat ) {
					?>
					<div class="tab-pane fade<?=esc_attr($i==1?' show active':'')?>" id="<?=esc_attr($cat->slug);?>" role="tabpanel" aria-labelledby="<?=esc_attr($cat->slug);?>-tab">
						<!-- content  -->
						<div class="row">
							<?php
							$args = [
								'post_type'      => 'product',
								'posts_per_page' => $pNumber,
								'post_status'    => 'publish',
								'tax_query' => 
								[
									[
										'taxonomy' => 'product-cat',
										'field'    => 'slug',
										'terms'    => $cat->slug,
									],
								],
								'ignore_sticky_posts'   => true
							];
							$products = new WP_Query( $args );
							if( $products->have_posts() ) {
								while( $products->have_posts() ) {
									$products->the_post();
									?>
									<div class="col-md-6">
										<div class="single_product mb_30">
											<div class="thumb">
												<?php 
													if ( has_post_thumbnail() ) {
														echo '<a href="'.get_the_permalink().'">';
															the_post_thumbnail( 'kimura_home_blog_product_thumb_340x210', ['alt' => get_the_title()] );
														echo '</a>';
													}
												?>
											</div>
											<div class="product_content">
												<a href="<?=the_permalink()?>"><h4><?=the_title()?></h4></a>
											</div>
										</div>
									</div>
									<?php
								}
							}
							wp_reset_postdata();
							?>        
						</div>
						<!--/ content  -->
					</div>
					<?php
					$i++;
				}
			}
			?>
		</div>
	</div>
	<?php
}
