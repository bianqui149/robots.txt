<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/bianqui149/
 * @since             1.0.0
 * @package           Robots_txt
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Robots txt
 * Plugin URI:        https://github.com/bianqui149/
 * Description:       Robots txt
 * Version:           1.0.0
 * Author:            Bianqui Julian
 * Author URI:        https://github.com/bianqui149/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       robots
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
//define the version
define( 'WP_ROBOTS', '1.0.0' );
//define the files requerid
define( 'WP_PLUGIN_ROBOTS', plugin_dir_path( __FILE__ ) );


require_once WP_PLUGIN_ROBOTS . '/admin/class-robots.php';
