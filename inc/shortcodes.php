<?php

/**
 * Shortcode: Product list
 * 
 * Adds a Glide carousel image slider to shortcode and can be placed on every page or post.
 * 
 * @since 1.1.0
 * @see https://github.com/glidejs/glide
 * 
 */

/** ACF */
//include ( plugin_dir_path( __FILE__ ) ) . '/inc/acf-globals.php';

function shortcode_rv_product_list ( $atts ) {

	ob_start();
	global $post;

	$attributes = shortcode_atts( array(
		'gender' => '',
		'brand' => '',
		'type' => '',
	), $atts );

	if ( empty( $atts['gender'] ) or empty( $atts['brand'] ) or empty( $atts['type'] ) ) {
		return 'No attributes are defined in shortcode!';
	}

	// Query custom post type
	$args = array(
		'post_type' => 'rv_products',
		'posts_per_page' => -1,
		'tax_query' => array(
			array (
				'taxonomy' => 'rv_product_gender',
				'field' => 'name',
				'terms' => $atts['gender'],
			),
			array (
				'taxonomy' => 'rv_product_brand',
				'field' => 'name',
				'terms' => $atts['brand'],
			),
			array (
				'taxonomy' => 'rv_product_type',
				'field' => 'name',
				'terms' => $atts['type'],
			),
		),
	);

	$products = new WP_Query( $args ); ?>
	
	<?php if ( $products->have_posts() ) : ?>

		<div id="product_list" class="container">

			<?php while( $products->have_posts() ) : $products->the_post(); ?>

				<div class="row align-items-center">
					<div class="col-5">
						<?php $product_list_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'product_list_image' ); ?>
						<img src="<?php echo $product_list_image[0]; ?>" alt="" width="100%" class="product_list_image">
					</div>
					<div class="col-7">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
					</div>
				</div>

			<?php endwhile; ?>

		</div>
		
	<?php endif; ?>
	
	<?php
	// Restore original Post Data
	wp_reset_postdata();

	return ob_get_clean();

}
add_shortcode( 'product_list', 'shortcode_rv_product_list' );