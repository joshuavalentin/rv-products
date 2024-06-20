<?php

/**
 * Load plugin textdomain
 * 
 * @since 1.0.0
 */
function rv_load_textdomain() {
	load_plugin_textdomain( 'rv-products', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'rv_load_textdomain' );