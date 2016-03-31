<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.lorainccc.edu
 * @since             1.0.0
 * @package           Wp2_Toolbox
 *
 * @wordpress-plugin
 * Plugin Name:       WP2 Toolbox
 * Plugin URI:        http://www.lorainccc.edu
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            LCCC Web Dev Team
 * Author URI:        http://www.lorainccc.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp2-toolbox
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp2-toolbox-activator.php
 */
function activate_wp2_toolbox() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp2-toolbox-activator.php';
	Wp2_Toolbox_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp2-toolbox-deactivator.php
 */
function deactivate_wp2_toolbox() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp2-toolbox-deactivator.php';
	Wp2_Toolbox_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp2_toolbox' );
register_deactivation_hook( __FILE__, 'deactivate_wp2_toolbox' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp2-toolbox.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp2_toolbox() {

	$plugin = new Wp2_Toolbox();
	$plugin->run();
}
run_wp2_toolbox();

require_once( plugin_dir_path( __FILE__ ).'php/login-logo.php' );
require_once( plugin_dir_path( __FILE__ ).'php/admin-widget.php' );
