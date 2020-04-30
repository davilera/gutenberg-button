<?php
/**
 * The plugin bootstrap file.
 *
 * Plugin Name:  Gutenberg Button
 * Plugin URI:   https://github.com/davilera/gutenberg-button
 * Description:  Adding a formatting button in Gutenberg.
 * Version:      1.0.0
 *
 * Author:       David Aguilera
 * Author URI:   https://neliosoftware.com
 * License:      GPL-3.0+
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Text Domain:  gutenberg-button
 *
 * @author  David Aguilera <david.aguilera@neliosoftware.com>
 */

namespace Gutenberg_Button;

defined( 'ABSPATH' ) or die();

function init_constants() {
	define( 'GUTENBERG_BUTTON_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
	define( 'GUTENBERG_BUTTON_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'GUTENBERG_BUTTON_VERSION', get_file_data( __FILE__, [ 'Version' ], 'plugin' )[0] );
}//end gutenberg_button_init_constants()
add_action( 'plugins_loaded', __NAMESPACE__ . '\init_constants', 1 );

function enqueue_script() {
	$asset = include GUTENBERG_BUTTON_PATH . '/build/index.asset.php';
	wp_enqueue_script(
		'gutenberg-button',
		GUTENBERG_BUTTON_URL . '/build/index.js',
		$asset['dependencies'],
		$asset['version']
	);
}//end enqueue_script()
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_script' );

