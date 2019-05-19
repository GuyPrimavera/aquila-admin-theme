<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }
$aquilaOptions = get_option( 'aquila_settings' );

if ( ! function_exists( 'get_plugins' ) ) {
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$aquilaShowPluginSupport = $aquilaHideDashboardMetaboxes = $aquilaNoPostToBlog = $aquilaHideFooter = $aquilaShowNag = $aquilaShowAdminbarLinks = $aquilaShowFullAdminbar = $aquilaCustomLogo = $aquilaCustomLogoSquare = $aquilaColourPrimary = $aquilaColourSecondary = $aquilaColourMenuBackground = $aquilaColourMenuText = $aquilaLoginDisable = false;

$aquilaDetails = get_plugins()['aquila-admin-theme/aquila-admin-theme.php'];
$aquilaVer = $aquilaDetails['Version'];

// Checkboxes
if ( aquila_isset('aquila_chk_pluginSupport') ) {
	$aquilaShowPluginSupport = true;
}

if ( aquila_isset('aquila_chk_dashBoxes') ) {
	$aquilaHideDashboardMetaboxes = true;
}

if ( aquila_isset('aquila_chk_postBlog') ) {
	$aquilaNoPostToBlog = true;
}

if ( aquila_isset('aquila_chk_hideFooter') ) {
	$aquilaHideFooter = true;
}

if ( aquila_isset('aquila_chk_showNag') ) {
	$aquilaShowNag = true;
}

if ( aquila_isset('aquila_chk_abLinks') ) {
	$aquilaShowAdminbarLinks = true;
}

if ( aquila_isset('aquila_chk_abVisible') ) {
	$aquilaShowFullAdminbar = true;
}
/*
if ( aquila_isset('aquila_new_logo') ) {
	$aquilaCustomLogo = true;
}

if ( aquila_isset('aquila_new_logo_sqr') ) {
	$aquilaCustomLogoSquare = true;
}

if ( aquila_isset('aquila_primary_colour') ) {
	$aquilaColourPrimary = true;
}
if ( aquila_isset('aquila_secondary_colour') ) {
	$aquilaColourSecondary = true;
}
if ( aquila_isset('aquila_menu_back_colour') ) {
	$aquilaColourMenuBackground = true;
}
if ( aquila_isset('aquila_menu_text_colour') ) {
	$aquilaColourMenuText = true;
}
*/
if ( aquila_isset('aquila_chk_loginDisable') ) {
	$aquilaLoginDisable = true;
}



?>