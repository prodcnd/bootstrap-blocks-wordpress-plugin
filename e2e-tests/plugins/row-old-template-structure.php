<?php
/**
 * Plugin Name: wp-bootstrap-blocks-test-row-old-template-structure
 * Description: [FOR TESTING PURPOSES ONLY] Plugin to test old row template structure.
 * Plugin URI: https://github.com/liip/bootstrap-blocks-wordpress-plugin
 * Author: Liip AG
 *
 * @package wp-bootstrap-blocks-test-row-old-template-structure
 */

/**
 * Registers a custom script for the plugin.
 */
function enqueue_row_old_template_structure_plugin_script() {
	wp_enqueue_script(
		'wp-bootstrap-blocks-test-row-old-template-structure',
		plugins_url( 'row-old-template-structure/index.js', __FILE__ ),
		array(
			'wp-hooks',
		),
		filemtime( plugin_dir_path( __FILE__ ) . 'row-old-template-structure/index.js' ),
		true
	);
}

add_action( 'init', 'enqueue_row_old_template_structure_plugin_script' );
