<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function aquila_support_widget() {
	wp_add_dashboard_widget(
	 'aquila-support', // Widget slug.
	 'Aquila Support', // Title.
	 'aquila_support_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'aquila_support_widget' );

function aquila_support_widget_function() {
	echo "	
	<p class='about-description'>
		<h4>Aquila Support</h4>
		<ul>
			<li><a href='https://designbymito.com/guides/product/aquila/' target='_blank'>Aquila User Guides</a></li>
			<li><a href='https://designbymito.com/contact/' target='_blank'>Mito Support</a></li>
			<li><a href='mailto:support@designbymito.com' target='_blank'>Email Support</a></li>
		</ul>
		<h4>WordPress Support</h4>
		<ul>
			<li><a href='https://codex.wordpress.org/WordPress_Lessons' target='_blank'>WordPress Lessons</a></li>
			<li><a href='http://easywpguide.com/wordpress-manual/' target='_blank'>WordPress User Guide</a></li>
		</ul>
	</p>";
}
