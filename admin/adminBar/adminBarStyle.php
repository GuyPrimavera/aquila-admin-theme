<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Admin Bar height
function aquila_admin_bar() {
	if ( is_admin_bar_showing() ) {
		echo "<style type='text/css' media='screen'>
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
			@media screen and ( max-width: 782px ) {
				html { margin-top: 0px !important; }
				* html body { margin-top: 0px !important; }
			}
		</style>
		";
	}
}
add_action( 'wp_head', 'aquila_admin_bar', 99 ); 
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

?>