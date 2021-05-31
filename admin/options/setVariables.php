<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

$aquilaOptions = get_option( 'aquila_settings' );

if (!function_exists('get_plugins')) {
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$aquilaShowPluginSupport = $aquilaHideDashboardMetaboxes = $aquilaNoPostToBlog = $aquilaHideFooter = $aquilaShowNag = $aquilaShowAdminbarLinks = $aquilaShowFullAdminbar = $aquilaCustomLogo = $aquilaCustomLogoSquare = $aquilaColourPrimary = $aquilaColourSecondary = $aquilaColourMenuBackground = $aquilaColourMenuText = $aquilaLoginDisable = false;

$aquilaDetails = get_plugins()['aquila-admin-theme/aquila-admin-theme.php'];
$aquilaVer = $aquilaDetails['Version'];

// Checkboxes
$aquilaShowPluginSupport = aquila_isset('aquila_chk_pluginSupport');
$aquilaHideDashboardMetaboxes = aquila_isset('aquila_chk_dashBoxes');
$aquilaNoPostToBlog = aquila_isset('aquila_chk_postBlog');
$aquilaHideFooter = aquila_isset('aquila_chk_hideFooter');
$aquilaShowNag = aquila_isset('aquila_chk_showNag');
$aquilaShowAdminbarLinks = aquila_isset('aquila_chk_abLinks');
$aquilaShowFullAdminbar = aquila_isset('aquila_chk_abVisible');
$aquilaHideLogoMenu = aquila_isset('aquila_chk_abLogoMenuHide');
$aquilaLoginDisable = aquila_isset('aquila_chk_loginDisable');
