<?php

function aquila_admin_support_widget() {
	
	wp_add_dashboard_widget(
	 'aquila-support',         								// Widget slug.
	 'Support',         											// Title.
	 'aquila_admin_support_widget_function' 	// Display function.
	);
}
add_action( 'wp_dashboard_setup', 'aquila_admin_support_widget' );

function aquila_admin_support_widget_function() {
	
	echo "	
	<p class='about-description'>
		<h2>Aquila Support</h2>
		<ul>
			<li><a href='https://designbymito.com/guides/product/aquila/' target='_blank'>Aquila User Guides</a></li>
			<li><a href='https://designbymito.com/contact/' target='_blank'>Mito Support</a></li>
			<li><a href='mailto:support@designbymito.com' target='_blank'>Email Support</a></li>
		</ul>
		<h2>WordPress Support</h2>
		<ul>
			<li><a href='https://codex.wordpress.org/WordPress_Lessons' target='_blank'>WordPress Lessons</a></li>
			<li><a href='http://easywpguide.com/wordpress-manual/' target='_blank'>WordPress User Guide</a></li>
		</ul>";

		if (current_user_can('manage_options')) {
			//include('/../functions/pluginList.php');
		}

	echo "</p>";
}

?>