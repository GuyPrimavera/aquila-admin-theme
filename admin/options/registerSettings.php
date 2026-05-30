<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

add_action('admin_menu', 'aquila_add_admin_menu');
add_action('admin_init', 'aquila_settings_init');

// Add admin menu under Settings
function aquila_add_admin_menu() { 
	add_submenu_page( 
		'options-general.php', 
		__('Aquila Settings', 'aquila-admin-theme'), 
		'<i class="aquila-aquila" style="font-size: 140%;float: right;line-height: 1;"></i>  ' . __('Aquila', 'aquila-admin-theme'), 
		'manage_options', 
		'aquilaSettings', 
		'aquila_options_page' 
	);
}

function aquila_settings_init() {
	// Add settings sections
	/*add_settings_section(
		'aquila_aquilaGeneralSettings_section', 
		__('General Settings', 'aquila-admin-theme'), 
		'aquilaGeneralCallback', 
		'aquilaGeneralSettings'
	);*/
	add_settings_section(
		'aquila_dashboardSettings_section', 
		__('Dashboard', 'aquila-admin-theme'), 
		'aquilaDashboardCallback', 
		'aquilaGeneralSettings'
	);
	add_settings_section(
		'aquila_adminbarSettings_section', 
		__('Admin bar', 'aquila-admin-theme'), 
		'aquilaAdminbarCallback', 
		'aquilaGeneralSettings'
	);
	add_settings_section(
		'aquila_loginSettings_section', 
		__('Login page', 'aquila-admin-theme'), 
		'aquilaLoginCallback', 
		'aquilaGeneralSettings'
	);
	add_settings_section(
		'aquila_logoSettings_section', 
		__('Custom Logo', 'aquila-admin-theme'), 
		'aquilaLogoCallback', 
		'aquilaLogoSettings'
	);
	add_settings_section(
		'aquila_colourSettings_section', 
		__('Color Scheme', 'aquila-admin-theme'), 
		'aquilaColourCallback', 
		'aquilaColourSettings'
	);
	add_settings_section(
		'aquila_colourMenuSettings_section', 
		__('Admin Menu Colors', 'aquila-admin-theme'), 
		'aquilaColourMenuCallback', 
		'aquilaColourSettings'
	);
	add_settings_section(
		'aquila_Help_section', 
		'', 
		'aquilaHelpCallback', 
		'aquilaHelp'
	);

	// Add settings fields
	// Dashboard settings
	add_settings_field( 
		'aquila_chk_pluginSupport', 
		__('Show Editors <strong>Plugins Support</strong> metabox?', 'aquila-admin-theme'), 
		'aquila_chk_pluginSupport_render', 
		'aquilaGeneralSettings', 
		'aquila_dashboardSettings_section' 
	);
	add_settings_field( 
		'aquila_chk_dashBoxes', 
		__('Show all other <strong>Dashboard metaboxes</strong>?', 'aquila-admin-theme'), 
		'aquila_chk_dashBoxes_render', 
		'aquilaGeneralSettings', 
		'aquila_dashboardSettings_section' 
	);
	add_settings_field( 
		'aquila_chk_postBlog', 
		__('Do not rename <strong>Posts</strong> to <strong>Blog</strong>', 'aquila-admin-theme'), 
		'aquila_chk_postBlog_render', 
		'aquilaGeneralSettings', 
		'aquila_dashboardSettings_section' 
	);
	add_settings_field( 
		'aquila_chk_hideFooter', 
		__('Hide <strong>Footer credit</strong> link.', 'aquila-admin-theme'), 
		'aquila_chk_hideFooter_render', 
		'aquilaGeneralSettings', 
		'aquila_dashboardSettings_section' 
	);
	add_settings_field( 
		'aquila_chk_showNag', 
		__('Show <strong>WordPress Update</strong> notices.', 'aquila-admin-theme'), 
		'aquila_chk_showNag_render', 
		'aquilaGeneralSettings', 
		'aquila_dashboardSettings_section' 
	);

	// Admin bar
	add_settings_field( 
		'aquila_chk_abLinks', 
		__('Show <strong>Adminbar</strong> links?', 'aquila-admin-theme'), 
		'aquila_chk_abLinks_render', 
		'aquilaGeneralSettings', 
		'aquila_adminbarSettings_section' 
	);
	add_settings_field( 
		'aquila_chk_abVisible', 
		__('Show <strong>Full Adminbar</strong> by default on front-end?', 'aquila-admin-theme'), 
		'aquila_chk_abVisible_render', 
		'aquilaGeneralSettings', 
		'aquila_adminbarSettings_section'
	);
	add_settings_field( 
		'aquila_chk_abLogoMenuHide', 
		__('<strong>Hide Adminbar Logo Menu?</strong>', 'aquila-admin-theme'), 
		'aquila_chk_abLogoMenuHide_render', 
		'aquilaGeneralSettings', 
		'aquila_adminbarSettings_section'
	);

	// Admin bar
	add_settings_field( 
		'aquila_chk_loginDisable', 
		__('<strong>Disable</strong> Aquila login page styling?', 'aquila-admin-theme'), 
		'aquila_chk_loginDisable_render', 
		'aquilaGeneralSettings', 
		'aquila_loginSettings_section' 
	);

	// Custom Logo
	add_settings_field( 
		'aquila_new_logo', 
		__('Custom logo', 'aquila-admin-theme'), 
		'aquila_new_logo_render', 
		'aquilaLogoSettings', 
		'aquila_logoSettings_section' 
	);
	add_settings_field( 
		'aquila_new_logo_sqr', 
		__('Custom logo (square) <br/><em>Used in the "folded" menu</em>', 'aquila-admin-theme'), 
		'aquila_new_logo_sqr_render', 
		'aquilaLogoSettings', 
		'aquila_logoSettings_section' 
	);

	// Colour Scheme
	add_settings_field( 
		'aquila_primary_colour', 
		__('Primary Color', 'aquila-admin-theme'), 
		'aquila_primary_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourSettings_section' 
	);
	add_settings_field( 
		'aquila_secondary_colour', 
		__('Secondary Color', 'aquila-admin-theme'), 
		'aquila_secondary_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourSettings_section' 
	);
	add_settings_field( 
		'aquila_link_text_colour', 
		__('Link Text Color', 'aquila-admin-theme'), 
		'aquila_link_text_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourSettings_section' 
	);
	/*
	add_settings_field( 
		'aquila_text_colour', 
		__('Text Color', 'aquila-admin-theme'), 
		'aquila_text_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourSettings_section' 
	);
	add_settings_field( 
		'aquila_background_colour', 
		__('Background Color', 'aquila-admin-theme'), 
		'aquila_background_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourSettings_section' 
	);
	*/
	add_settings_field( 
		'aquila_menu_back_colour', 
		__('Menu Background Color', 'aquila-admin-theme'), 
		'aquila_menu_back_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourMenuSettings_section' 
	);
	add_settings_field( 
		'aquila_menu_text_colour', 
		__('Menu Text Color', 'aquila-admin-theme'), 
		'aquila_menu_text_colour_render', 
		'aquilaColourSettings', 
		'aquila_colourMenuSettings_section' 
	);

	// Register settings
	register_setting('aquilaGeneralSettings', 'aquila_settings', 'aquila_sanitize_general_settings');
	register_setting('aquilaLogoSettings', 'aquilaLogoSettings', 'aquila_sanitize_logo_settings');
	register_setting('aquilaAdminbarSettings', 'aquilaAdminbarSettings', 'aquila_sanitize_adminbar_settings');
	register_setting('aquilaColourSettings', 'aquilaColourSettings', 'aquila_sanitize_colour_settings');
}

function aquila_sanitize_general_settings(mixed $input): array {
	$input = is_array($input) ? $input : array();
	$checkboxes = array(
		'aquila_chk_pluginSupport',
		'aquila_chk_dashBoxes',
		'aquila_chk_postBlog',
		'aquila_chk_hideFooter',
		'aquila_chk_showNag',
		'aquila_chk_abLinks',
		'aquila_chk_abVisible',
		'aquila_chk_abLogoMenuHide',
		'aquila_chk_loginDisable',
	);

	$sanitized = array();
	foreach ($checkboxes as $key) {
		$sanitized[$key] = empty($input[$key]) ? 0 : 1;
	}

	return $sanitized;
}

function aquila_sanitize_logo_settings(mixed $input): array {
	$input = is_array($input) ? $input : array();
	$sanitized = array(
		'aquila_new_logo' => '',
		'aquila_new_logo_sqr' => '',
	);

	foreach ($sanitized as $key => $default) {
		$sanitized[$key] = empty($input[$key]) ? '' : esc_url_raw($input[$key]);
	}

	return $sanitized;
}

function aquila_sanitize_adminbar_settings(mixed $input): array {
	return is_array($input) ? $input : array();
}

function aquila_sanitize_colour_settings(mixed $input): array {
	$input = is_array($input) ? $input : array();
	$defaults = array(
		'aquila_primary_colour' => '#039be5',
		'aquila_secondary_colour' => '#ffeb3b',
		'aquila_link_text_colour' => '#212121',
		'aquila_menu_back_colour' => '#212121',
		'aquila_menu_text_colour' => '#ffffff',
	);

	$sanitized = array();
	foreach ($defaults as $key => $default) {
		$value = isset($input[$key]) ? sanitize_hex_color($input[$key]) : null;
		$sanitized[$key] = $value ? $value : $default;
	}

	return $sanitized;
}

// Add Settings link to Plugins page
function aquila_action_links(array $links): array {
   $aquila_links[] = '<a href="'. esc_url(get_admin_url(null, 'options-general.php?page=aquilaSettings')) .'">'. __('Settings', 'aquila-admin-theme') .'</a>';

   return array_merge($aquila_links, $links);
}
