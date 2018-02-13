<?php

// Admin Bar height

function aquila_admin_bar() {

if ( is_admin_bar_showing() ) {

	echo "<style type='text/css' media='screen'>
		html { margin-top: 50px !important; }
		* html body { margin-top: 50px !important; }
		@media screen and ( max-width: 782px ) {
			html { margin-top: 46px !important; }
			* html body { margin-top: 46px !important; }
		}
	</style>
	";
}
}
	 
add_action( 'wp_head', 'aquila_admin_bar', 99 ); 

?>