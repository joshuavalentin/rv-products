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

	// Set default attributes and merge with provided attributes
    $attributes = shortcode_atts( array(
        'gender' => '', // Default to empty string
        'brand' => '',  // Default to empty string
        'type' => '',   // Default to empty string
    ), $atts );

    // Build tax_query based on provided attributes
    $tax_query = array( 'relation' => 'AND' );
    
    if ( !empty( $attributes['gender'] ) ) {
        $tax_query[] = array(
            'taxonomy' => 'rv_product_gender',
            'field' => 'name',
            'terms' => $attributes['gender'],
        );
    }
    
    if ( !empty( $attributes['brand'] ) ) {
        $tax_query[] = array(
            'taxonomy' => 'rv_product_brand',
            'field' => 'name',
            'terms' => $attributes['brand'],
        );
    }
    
    if ( !empty( $attributes['type'] ) ) {
        $tax_query[] = array(
            'taxonomy' => 'rv_product_type',
            'field' => 'name',
            'terms' => $attributes['type'],
        );
    }

    // If no attributes are set, do not use tax_query
    $args = array(
        'post_type' => 'rv_products',
        'posts_per_page' => -1,
    );

    // Only add tax_query if it's not empty
    if ( !empty( $tax_query ) ) {
        $args['tax_query'] = $tax_query;
    }

	$products = new WP_Query( $args ); ?>
	
	<?php if ( $products->have_posts() ) : ?>

		<div id="product_list" class="container">

			<?php while( $products->have_posts() ) : $products->the_post(); ?>

				<div class="row align-items-center">
					<div class="col-5">
						<?php $product_list_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'product_list_image' ); ?>
						<?php if ( $product_list_image ) : ?>
							<img src="<?php echo $product_list_image[0]; ?>" alt="" width="100%" class="product_list_image">
						<?php endif; ?>
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