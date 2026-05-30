<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

if (!function_exists('aquila_plugin_file')) {
	function aquila_plugin_file() {
		return defined('AQUILA_ADMIN_THEME_FILE') ? AQUILA_ADMIN_THEME_FILE : __DIR__ . '/aquila-admin-theme.php';
	}
}

if (!function_exists('aquila_plugin_version')) {
	function aquila_plugin_version() {
		if (defined('AQUILA_ADMIN_THEME_VERSION')) {
			return AQUILA_ADMIN_THEME_VERSION;
		}

		return isset($GLOBALS['aquilaVer']) ? $GLOBALS['aquilaVer'] : null;
	}
}

// Global scripts
function aquila_global_load_style() {
	$plugin_url = plugin_dir_url(aquila_plugin_file());
	$version = aquila_plugin_version();

	if (is_admin_bar_showing()) {
		wp_enqueue_script('jquery');
		wp_enqueue_style('aquila-admin-icons', $plugin_url . 'icons/aquila/style.css', array(), $version);
		wp_enqueue_style('aquila-adminBar-style', $plugin_url . 'css/adminBar.css', array(), $version);
		wp_enqueue_script('aquilaCalls', $plugin_url . 'js/calls.js', array('jquery'), $version, true);
	}
}
add_action('admin_enqueue_scripts', 'aquila_global_load_style');
add_action('wp_enqueue_scripts', 'aquila_global_load_style', 99);

// Admin scripts
function aquila_admin_load_style() {
	$plugin_url = plugin_dir_url(aquila_plugin_file());
	$version = aquila_plugin_version();

	wp_enqueue_style('aquila-admin-style', $plugin_url . 'css/aquila.css', array(), $version);
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('wp-color-picker');

	if(function_exists('wp_enqueue_media')){
    wp_enqueue_media();
	} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	}
}
add_action('admin_enqueue_scripts', 'aquila_admin_load_style', 99);

// Login scripts
function aquila_login_load_style() {
	$plugin_url = plugin_dir_url(aquila_plugin_file());
	$version = aquila_plugin_version();

	wp_enqueue_style('aquila-admin-icons', $plugin_url . 'icons/aquila/style.css', array(), $version);
	wp_enqueue_style('aquila-login-style', $plugin_url . 'css/login.css', array(), $version);
}

if (empty($GLOBALS['aquilaLoginDisable']) || !$GLOBALS['aquilaLoginDisable']) {
	add_action('login_enqueue_scripts', 'aquila_login_load_style');
}

// i18n
function aquila_i18n_setup() {
  $locale = apply_filters('plugin_locale', get_locale(), 'aquila-admin-theme');
  load_textdomain('aquila-admin-theme', WP_LANG_DIR . "/aquila-admin-theme-$locale.mo");
	load_plugin_textdomain('aquila-admin-theme', false, dirname(plugin_basename(aquila_plugin_file())) . '/lang/');
}
add_action('plugins_loaded', 'aquila_i18n_setup');
