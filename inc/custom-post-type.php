<?php

/**
 * Custom Post Type: Products
 * 
 * @since 1.0.0
 * @see register_post_type, https://developer.wordpress.org/reference/functions/register_post_type/
 */
if ( ! function_exists( 'custom_post_type_rv_products' ) ) {
	function custom_post_type_rv_products() {
		$labels = array(
			'name'                  => _x( 'Products', 'products', 'rv-products' ),
			'singular_name'         => _x( 'Product', 'product', 'rv-products' ),
			'menu_name'             => __( 'Products', 'rv-products' ),
			'name_admin_bar'        => __( 'Products', 'rv-products' ),
			'archives'              => __( 'Products', 'rv-products' ),
			//'attributes'            => __( '', 'rv-products' ),
			//'parent_item_colon'     => __( '', 'rv-products' ),
			'all_items'             => __( 'All products', 'rv-products' ),
			'add_new_item'          => __( 'Add new product', 'rv-products' ),
			'add_new'               => __( 'Add new product', 'rv-products' ),
			'new_item'              => __( 'New product', 'rv-products' ),
			'edit_item'             => __( 'Edit product', 'rv-products' ),
			'update_item'           => __( 'Update product', 'rv-products' ),
			'view_item'             => __( 'View product', 'rv-products' ),
			'view_items'            => __( 'View products', 'rv-products' ),
			'search_items'          => __( 'Search product', 'rv-products' ),
			'not_found'             => __( 'Not found', 'rv-products' ),
			'not_found_in_trash'    => __( 'Not found in trash', 'rv-products' ),
			'featured_image'        => __( 'Featured image', 'rv-products' ),
			'set_featured_image'    => __( 'Set featured image', 'rv-products' ),
			'remove_featured_image' => __( 'Remove featured image', 'rv-products' ),
			'use_featured_image'    => __( 'Use as featured image', 'rv-products' ),
			'insert_into_item'      => __( 'Insert into item', 'rv-products' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'rv-products' ),
			'items_list'            => __( 'Items list', 'rv-products' ),
			'items_list_navigation' => __( 'Items list navigation', 'rv-products' ),
			'filter_items_list'     => __( 'Filter items list', 'rv-products' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'rv-products' ),
			'description'           => __( 'Products', 'rv-products' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			// 'taxonomies'            => array( 'location', ' education_level', ' fte' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_rest'			=> true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-products',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'				=> array( 'slug' => 'product' ),
			'capability_type'       => 'page',
		);
		register_post_type( 'rv_products', $args );
	}

	/* Hook into the init action & call "custom_post_type_rv_products" when it fires */
	add_action( 'init', 'custom_post_type_rv_products', 0 );
}