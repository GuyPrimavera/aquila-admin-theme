<?php
/**
 * Plugin Name: Aquila Admin Theme
 * Plugin URI: https://wordpress.org/plugins/aquila-admin-theme/
 * Description: The Aquila Admin Theme
 * Author: Guy Primavera
 * Author URI: https://guyprimavera.com/
 * Version: 4.0-beta
 * Text Domain: aquila-admin-theme
 * Domain Path: /lang/
 * License: GPL2
 *
 * Guy Primavera
 */ 

if (!defined('ABSPATH')) {
	exit;
}

if (!defined('AQUILA_ADMIN_THEME_FILE')) {
	define('AQUILA_ADMIN_THEME_FILE', __FILE__);
}

if (!defined('AQUILA_ADMIN_THEME_VERSION')) {
	define('AQUILA_ADMIN_THEME_VERSION', '4.0');
}

require_once __DIR__ . '/admin/options/options.php';
require_once __DIR__ . '/scripts.php';

require_once __DIR__ . '/login/aquila-login-screen.php';
require_once __DIR__ . '/admin/dashboard.php';
require_once __DIR__ . '/admin/adminBar.php';
require_once __DIR__ . '/admin/colour/colourScheme.php';

// Plugin action links
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'aquila_action_links' );
