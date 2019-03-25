<?php
/**
 * Plugin Name: Purple DS HUB - Admin Theme
 * Description: Purple DS HUB Admin Theme - derived from The Aquila Admin Theme by Guy Primavera
 * Author: sprylab technologies
 * Version: HUB - 1.0.1
 * Text Domain: aquila-admin-theme
 * Domain Path: /lang/
 * License: GPL2
 *
 * 2018 Guy Primavera
 */ 

$aquilaVer = "2.4";

include ('scripts.php');
include ('login/aquila-login-screen.php');
include ('admin/dashboard.php');
include ('admin/adminBar.php');
include ('admin/options/options.php');
include ('admin/colour/colourScheme.php');

// Plugin action links
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'aquila_action_links' );
?>