<?php


function aquila_plugin_widget() {

	$aquilaOptions = get_option( 'aquila_settings' );

	if(isset($aquilaOptions['aquila_chk_pluginSupport']) && $aquilaOptions['aquila_chk_pluginSupport'] == 1){
		$pluginCaps = 'edit_others_pages';
	} else {
		$pluginCaps = 'manage_options';
	}


	if (current_user_can( $pluginCaps )) {

		wp_add_dashboard_widget(
		 'aquila-plugin-support',
		 'Plugins Support',
		 'aquila_plugin_widget_function'
		);

	}

}

add_action( 'wp_dashboard_setup', 'aquila_plugin_widget' );

function aquila_plugin_widget_function() {

echo "<p class='about-description'>"; 

	$aquilaOptions = get_option( 'aquila_settings' );
	if(isset($aquilaOptions['aquila_chk_pluginSupport']) && $aquilaOptions['aquila_chk_pluginSupport'] == 1){
		echo " <p>Visible to <strong>Editors</strong>.</p> ";
	} else {
		echo " <p>Visible to <strong>Administrators</strong>.</p> ";
	}
	
	echo "<ul>";

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

	$Count++;
	}

	echo "</ul></p>";
}


?>