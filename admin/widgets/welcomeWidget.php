<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Add Welcome Widget

function aquila_welcome_widget() {
	
	$aquilaName = get_bloginfo('name');

	wp_add_dashboard_widget(
                 'welcome-to-aquila',										// Widget slug.
                 $aquilaName,        										// Title.
                 'aquila_welcome_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'aquila_welcome_widget' );

// Widget Content

function aquila_welcome_widget_function() {
	
	global $aquilaVer;
	$wordpressVer = get_bloginfo('version');
	$aquilaName = get_bloginfo('name');
	$aquilaUrl = get_bloginfo('url');
	$themeInfo = wp_get_theme();

	// Memory and server stats

	$memLimit = (int) ini_get('memory_limit');
	$memUsage= function_exists('memory_get_peak_usage') ? round(memory_get_peak_usage(TRUE) / 1024 / 1024, 2) : 0;			
	if ( !empty($memUsage) && !empty($memLimit) ) {
		$memPercent = round ($memUsage / $memLimit * 100, 0);
	}		

	$server_ip_address = (!empty($_SERVER[ 'SERVER_ADDR' ]) ? $_SERVER[ 'SERVER_ADDR' ] : "");
	if ($server_ip_address == "") { // Added for IP Address in IIS
		$server_ip_address = (!empty($_SERVER[ 'LOCAL_ADDR' ]) ? $_SERVER[ 'LOCAL_ADDR' ] : "");
	}
	$hostName = gethostname();
	$phpVersion = PHP_VERSION;
	$osBits = (PHP_INT_SIZE * 8);

	
	echo "	
	<p class='about-description'>
		<ul>
			<li><i class='aquila-wordpress'></i><strong>" . __( 'WordPress', 'aquila-admin-theme' ) . "</strong><br/>" . $wordpressVer . "</li>
			<li><i class='aquila-aquila'></i><strong>" . __( 'Aquila', 'aquila-admin-theme' ) . "</strong><br/>" . $aquilaVer . "</li>
			<li><i class='aquila-palette'></i><strong>" . $themeInfo->get( 'Name' ) . "</strong><br/>" . $themeInfo->get( 'Version' ) . "</li>
			<li><i class='aquila-terminal'></i><strong>" . __( 'Server IP', 'aquila-admin-theme' ) . "</strong><br/>" . $server_ip_address . "</li>
			<li><i class='aquila-php'></i><strong>" . __( 'PHP', 'aquila-admin-theme' ) . "</strong><br/>" . $phpVersion . "</li>
			<li><i class='aquila-cubes'></i><strong>" . __( 'Memory Usage', 'aquila-admin-theme' ) . "</strong><br/>" . $memUsage . " / " . $memLimit . "MB (" . $memPercent . "%)</li>
		</ul>
	</p>
	";
}
 ?>