<?php

echo "<h2>Plugins Support</h2><ul>";

// Check if get_plugins() function exists. This is required on the front end of the
// site, since it is in a file that is normally only loaded in the admin.
if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$allPlugins = get_plugins();
$allPluginsKeys = array_keys($allPlugins);

$Count = 0;
foreach ($allPlugins as $pluginItem) {

	$pluginRootFile		= $allPluginsKeys[$Count];
	$pluginTitle			= $pluginItem['Title'];
	$pluginVersion		= $pluginItem['Version'];
	$pluginURI				= $pluginItem['PluginURI'];
	$pluginDomain			= $pluginItem['TextDomain'];
	$pluginStatus			= is_plugin_active($pluginRootFile) ? 'active' : 'inactive';

	if (($pluginStatus == "active") && ($pluginURI)) {
		echo "<li><a href='" . $pluginURI . "' target='_blank'>" . $pluginTitle . "</a></li>";
	}

	//echo print_r($allPlugins, true);

$Count++;
}

echo "</ul>"

?>