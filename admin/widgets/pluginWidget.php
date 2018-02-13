<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

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
		 'Plugin Support',
		 'aquila_plugin_widget_function'
		);

	}

}

add_action( 'wp_dashboard_setup', 'aquila_plugin_widget' );

function aquila_plugin_widget_function() {

echo "<p class='about-description'>"; 

	$aquilaOptions = get_option( 'aquila_settings' );
	$aquilaSettingsLink = 'options-general.php?page=aquilaSettings';

	if(isset($aquilaOptions['aquila_chk_pluginSupport']) && $aquilaOptions['aquila_chk_pluginSupport'] == 1){
		$visibleText = sprintf( __( '<p>Visible to <a href="%s"><strong>Editors</strong></a></p>', 'aquila-admin-theme' ), $aquilaSettingsLink );
	} else {
		$visibleText = sprintf( __( '<p>Visible to <a href="%s"><strong>Administrators</strong></a></p>', 'aquila-admin-theme' ), $aquilaSettingsLink );
	}

	echo $visibleText;

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