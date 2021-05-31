<?php
/**
 * Plugin Name: Aquila Admin Theme
 * Plugin URI: https://wordpress.org/plugins/aquila-admin-theme/
 * Description: The Aquila Admin Theme
 * Author: Guy Primavera
 * Author URI: https://guyprimavera.com/
 * Version: 3.1.1
 * Text Domain: aquila-admin-theme
 * Domain Path: /lang/
 * License: GPL2
 *
 * Guy Primavera
 */ 

include ('admin/options/options.php');
include ('scripts.php');

include ('login/aquila-login-screen.php');
include ('admin/dashboard.php');
include ('admin/adminBar.php');
include ('admin/colour/colourScheme.php');

// Plugin action links
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'aquila_action_links' );
