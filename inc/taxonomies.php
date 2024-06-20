<?php

/**
 * Custom Taxonomies: Gender
 * 
 * @since 1.0.0
 * @see register_taxonomy, https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'custom_taxonomies_rv_products' ) ) {
	function custom_taxonomies_rv_products() {

		/* Type & make it hierarchical (like categories) */
		$labels = array(
			'name'					=> _x( 'Gender', 'gender', 'rv-products' ),
			'singular_name'			=> _x( 'Gender', 'gender', 'rv-products' ),
			'search_items'			=> __( 'Search gender', 'rv-products' ),
			'all_items'				=> __( 'All gender', 'rv-products' ),
			'parent_item'			=> __( 'Parent gender', 'rv-products' ),
			'parent_item_colon'		=> __( 'Parent gender:', 'rv-products' ),
			'edit_item'				=> __( 'Edit gender', 'rv-products' ),
			'update_item'			=> __( 'Update gender', 'rv-products' ),
			'add_new_item'			=> __( 'Add new gender', 'rv-products' ),
			'new_item_name'			=> __( 'New gender name', 'rv-products' ),
			'menu_name'				=> __( 'Gender', 'rv-products' ),
		);
		$args = array(
			'hierarchical'			=> true,
			'labels'				=> $labels,
			'show_ui'				=> true,
			'show_admin_column'		=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => 'product-gender' ),
			'show_in_rest'			=> true,
		);
		register_taxonomy( 'rv_product_gender', array( 'rv_products' ), $args );
		
	}

	/* Hook into the init action & call "custom_taxonomies_rv_products" when it fires */
	add_action( 'init', 'custom_taxonomies_rv_products', 0 );
}

/**
 * Custom Taxonomies: Brand
 * 
 * @since 1.0.0
 * @see register_taxonomy, https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'custom_taxonomies_rv_brand' ) ) {
	function custom_taxonomies_rv_brand() {

		/* Type & make it hierarchical (like categories) */
		$labels = array(
			'name'					=> _x( 'Brands', 'brands', 'rv-products' ),
			'singular_name'			=> _x( 'Brand', 'brand', 'rv-products' ),
			'search_items'			=> __( 'Search brands', 'rv-products' ),
			'all_items'				=> __( 'All brands', 'rv-products' ),
			'parent_item'			=> __( 'Parent brand', 'rv-products' ),
			'parent_item_colon'		=> __( 'Parent brand:', 'rv-products' ),
			'edit_item'				=> __( 'Edit brand', 'rv-products' ),
			'update_item'			=> __( 'Update brand', 'rv-products' ),
			'add_new_item'			=> __( 'Add new brand', 'rv-products' ),
			'new_item_name'			=> __( 'New brand name', 'rv-products' ),
			'menu_name'				=> __( 'Brands', 'rv-products' ),
		);
		$args = array(
			'hierarchical'			=> true,
			'labels'				=> $labels,
			'show_ui'				=> true,
			'show_admin_column'		=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => 'product-brand' ),
			'show_in_rest'			=> true,
		);
		register_taxonomy( 'rv_product_brand', array( 'rv_products' ), $args );
		
	}

	/* Hook into the init action & call "custom_taxonomies_rv_brand" when it fires */
	add_action( 'init', 'custom_taxonomies_rv_brand', 0 );
}

/**
 * Custom Taxonomies: Type
 * 
 * @since 1.0.0
 * @see register_taxonomy, https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'custom_taxonomies_rv_type' ) ) {
	function custom_taxonomies_rv_type() {

		/* Type & make it hierarchical (like categories) */
		$labels = array(
			'name'					=> _x( 'Types', 'types', 'rv-products' ),
			'singular_name'			=> _x( 'Type', 'type', 'rv-products' ),
			'search_items'			=> __( 'Search types', 'rv-products' ),
			'all_items'				=> __( 'All types', 'rv-products' ),
			'parent_item'			=> __( 'Parent type', 'rv-products' ),
			'parent_item_colon'		=> __( 'Parent type:', 'rv-products' ),
			'edit_item'				=> __( 'Edit type', 'rv-products' ),
			'update_item'			=> __( 'Update type', 'rv-products' ),
			'add_new_item'			=> __( 'Add new type', 'rv-products' ),
			'new_item_name'			=> __( 'New type name', 'rv-products' ),
			'menu_name'				=> __( 'Types', 'rv-products' ),
		);
		$args = array(
			'hierarchical'			=> true,
			'labels'				=> $labels,
			'show_ui'				=> true,
			'show_admin_column'		=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => 'product-type' ),
			'show_in_rest'			=> true,
		);
		register_taxonomy( 'rv_product_type', array( 'rv_products' ), $args );
		
	}

	/* Hook into the init action & call "custom_taxonomies_rv_type" when it fires */
	add_action( 'init', 'custom_taxonomies_rv_type', 0 );
}