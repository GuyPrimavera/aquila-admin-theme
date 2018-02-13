<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

echo "<h2>" . _e( 'Plugins Support', 'aquila-admin-theme' ) . "</h2><ul>";

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