<?php

// Add Welcome Widget

function aquila_admin_welcome_widget() {
	
	$aquilaName = get_bloginfo('name');

	wp_add_dashboard_widget(
                 'welcome-to-aquila',										// Widget slug.
                 $aquilaName,        										// Title.
                 'aquila_admin_welcome_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'aquila_admin_welcome_widget' );

// Widget Content

function aquila_admin_welcome_widget_function() {
	
	global $aquilaVer;
	$wordpressVer = get_bloginfo('version');
	$aquilaName = get_bloginfo('name');
	$aquilaUrl = get_bloginfo('url');
	$themeInfo = wp_get_theme();
	
	echo "	
	<p class='about-description'>
		<h2>Website Information</h2>
		<ul>
			<li>WordPress Version: &nbsp; " . $wordpressVer . "</li>
			<li>Website Address: &nbsp; <a href='" . $aquilaUrl . "' target='_blank'>" . $aquilaUrl . "</a></li>
			<li>Theme: &nbsp; " . $themeInfo->get( 'Name' ) . " (" . $themeInfo->get( 'Version' ) . ")</li>
		</ul>
		<h2>Aquila Information</h2>
		<ul>
			<li>Aquila Version: &nbsp; " . $aquilaVer . "</li>
			<li>Author: &nbsp; Guy Primavera (<a href='https://designbymito.com/' target='_blank'>design by Mito</a>)</li>
		</ul>
	</p>
	";
}
 ?>