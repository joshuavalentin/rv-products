<?php

/**
 * Shortcode: sponsor_slides_2
 * 
 * Adds a Glide carousel image slider to shortcode and can be placed on every page or post.
 * 
 * @since 1.1.0
 * @see https://github.com/glidejs/glide
 * 
 */

/** ACF */
//include ( plugin_dir_path( __FILE__ ) ) . '/inc/acf-globals.php';

function shortcode_rv_sponsor_slides_2 ( $atts ) {

	ob_start();
	global $post;

	$attributes = shortcode_atts( array(
		'type' => '',
		'preview' => '3',
	), $atts );

	if ( empty( $atts['type'] ) ) {
		return 'Sponsor type attribute needs to be added in shortcode! [sponsor_carousel type="SPONSOR TYPE SLUG"]';
	}

	// Query custom post type
	$args = array(
		'post_type' => 'rv_sponsors',
		'posts_per_page' => -1,
		'tax_query' => array(
			array (
				'taxonomy' => 'rv_sponsor_type',
				'field' => 'slug',
				'terms' => $atts['type'],
			)
		),
	);

	$sponsors = new WP_Query( $args ); ?>
	
	<?php if ( $sponsors->have_posts() ) : ?>

		<div id="sponsor-slides" class="glide">
			<div class="glide__track" data-glide-el="track">
				<ul class="glide__slides">

					<?php while( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

						<?php $sponsor_logo = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sponsor_logo' ); ?>

						<li class="glide__slide">
							<img src="<?php echo $sponsor_logo[0]; ?>" alt="" width="" class="sponsor_logo">
						</li>

					<?php endwhile; ?>

				</ul>
			</div>
			<div class="glide__arrows" data-glide-el="controls">
				<button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-chevron-left"></i></button>
				<button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-chevron-right"></i></button>
			</div>
		</div>
		
	<?php endif; ?>

	<script>
		new Glide( '.glide', {
			type: 'carousel',
			perView: <?php echo constant( 'RV_SPONSOR_SLIDER_PER_VIEW' ); ?>,
			breakpoints: {
				767: {
					perView: 2
				},
				467: {
					perView: 1
				}
			}
		} ).mount();
	</script>
	
	<?php
	// Restore original Post Data
	wp_reset_postdata();

	return ob_get_clean();

}
add_shortcode( 'sponsor_slides_2', 'shortcode_rv_sponsor_slides_2' );

/**
 * Shortcode: sponsor_slides
 * 
 * Adds a Bootstrap carousel image slider to shortcode and can be placed on every page or post.
 * 
 * @since 1.0.0
 * @see add_shortcode, https://developer.wordpress.org/reference/functions/add_shortcode/
 */

function shortcode_rv_sponsor_slides( $atts ) {

	ob_start();
	global $post;

	$attributes = shortcode_atts( array(
		'type' => '',
	), $atts );

	if ( empty( $atts['type'] ) ) {
		return 'Sponsor type attribute needs to be added in shortcode! [sponsor_carousel type="SPONSOR TYPE SLUG"]';
	}
	
	// Query custom post type
	$args = array(
		'post_type' => 'rv_sponsors',
		'posts_per_page' => -1,
		'tax_query' => array(
			array (
				'taxonomy' => 'rv_sponsor_type',
				'field' => 'slug',
				'terms' => $atts['type'],
			)
		),
	);

	$sponsors = new WP_Query( $args ); ?>
	
	<div id="sponsor-slides" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

		<div class="carousel-inner">

			<?php 
			// Loop through posts

			if ( $sponsors->have_posts() ) : 
				while ( $sponsors->have_posts() ) : $sponsors->the_post();
			?>
		
			<div class="carousel-item <?php echo $sponsors->current_post >= 1 ? '' : 'active'; ?>">
				<?php $sponsor_logo = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sponsor_logo' ); ?>
				<img src="<?php echo $sponsor_logo[0]; ?>" alt="" width="" class="d-block mx-auto sponsor_logo">
			</div>

				<?php endwhile;
			endif; ?>

		</div>

		<button class="carousel-control-prev" type="button" data-bs-target="#sponsor-slides" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#sponsor-slides" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>

	</div>
	
	<?php
	// Restore original Post Data
	wp_reset_postdata();

	return ob_get_clean();

}
add_shortcode( 'sponsor_slides', 'shortcode_rv_sponsor_slides' );

/**
 * Shortcode: sponsor_list
 * 
 * Adds a Bootstrap grip layout to shortcode and can be placed on every page or post.
 * 
 * @since 1.0.0
 */

function shortcode_rv_sponsor_list() {

	ob_start();
	global $post;

	// Query custom post type
	$args = array(
		'post_type' => 'rv_sponsors',
		'posts_per_page' => -1,
		'order' => 'ASC'

	);

	$sponsors = new WP_Query( $args );

	// Loop through posts
	if ( $sponsors->have_posts() ) : 
		while ( $sponsors->have_posts() ) : $sponsors->the_post();
	?>

	<div class="card mb-3 sponsor_list_item">
		<div class="row g-0 align-items-center">
			<div class="col-md-4">
				<?php $sponsor_logo = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sponsor_logo' ); ?>
				<img src="<?php echo $sponsor_logo[0]; ?>" alt="" width="" class="img-fluid rounded-start">
			</div>
			<div class="col-md-6 offset-md-2">
				<div class="card-body">
					<h5 class="card-title"><?php the_title(); ?></h5>
					<?php echo '<p class="card-text">' . get_the_excerpt() . '</p>'; ?>
					<a href="<?php echo get_permalink(); ?>" class="btn"><?php _e( 'Meer weten over deze sponsor', 'rv' );?></a>
				</div>
			</div>
		</div>
	</div>

		<?php endwhile;
	endif;

	// Restore original Post Data
	wp_reset_postdata();

	return ob_get_clean();

}
add_shortcode( 'sponsor_list', 'shortcode_rv_sponsor_list' );