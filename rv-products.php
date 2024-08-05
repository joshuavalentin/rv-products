<?php

/**
 * @package RV_Products
 * 
 * @since 1.0.0
 */

/**
 * Plugin Name: RV Products
 * Plugin URI: https://revealit.nl/
 * Description: Adding the custom post type "Products" to WordPress theme.
 * Version: 1.0.1
 * Author: Revealit
 * Author URI: https://revealit.nl
 * Text Domain: rv-products
 * Domain Path: /languages
 * License: MIT
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

include ( plugin_dir_path( __FILE__ ) ) . '/inc/text-domain.php';
include ( plugin_dir_path( __FILE__ ) ) . '/inc/custom-post-type.php';
include ( plugin_dir_path( __FILE__ ) ) . '/inc/taxonomies.php';
include ( plugin_dir_path( __FILE__ ) ) . '/inc/shortcodes.php';
include ( plugin_dir_path( __FILE__ ) ) . '/inc/acf-globals.php';

add_image_size( 'product_list_image', 500, 500, false );