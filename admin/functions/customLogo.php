<?php 
if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Custom Logo

$aquilaOptions = get_option( 'aquila_settings' );

if( isset($aquilaOptions['aquila_new_logo']) && $aquilaOptions['aquila_new_logo'] !== "" ) {

	// Admin bar
	function aquila_new_logo_admin() {

		$options = get_option( 'aquila_settings' );
		if ( isset ( $options['aquila_new_logo'] ) ) { 
			$aquilaNewLogo = $options['aquila_new_logo']; 
		} else { 
			$aquilaNewLogo = 'none'; 
		};

		echo "<style type='text/css'>
			#wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			#wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $aquilaNewLogo . "')!important;
				background-size: contain;
		    background-repeat: no-repeat;
		    background-position: center center;
		    margin: 5%!important;
		    max-width: 90%;
		    height: 60%;
			}
		</style>";
	}
		 
	add_action( 'admin_bar_init', 'aquila_new_logo_admin', 82 ); 

	// Login screen
	function aquila_new_logo_login() {

		$options = get_option( 'aquila_settings' );
		if ( isset ( $options['aquila_new_logo'] ) ) { 
			$aquilaNewLogo = $options['aquila_new_logo']; 
		} else { 
			$aquilaNewLogo = 'none'; 
		};

		echo "<style type='text/css'>
			body.login #login:before {
				display: none!important;
			}
			body.login #login h1 a {
				display: block!important;
			}
			body.login #login h1 a {
				background-image: url('" . $aquilaNewLogo . "')!important;
				background-size: contain;
		    background-repeat: no-repeat;
		    background-position: center center;
		    width: auto;
		    height: 80px;
		    max-width: 350px;
			}
		</style>";
	}
		 
	add_action( 'login_head', 'aquila_new_logo_login', 82 ); 

}

// Custom Logo (square)

if( isset($aquilaOptions['aquila_new_logo_sqr']) && $aquilaOptions['aquila_new_logo_sqr'] !== "" ) {

	function aquila_new_logo_sqr_admin() {

		$options = get_option( 'aquila_settings' );
		if ( isset ( $options['aquila_new_logo_sqr'] ) ) { 
			$aquilaNewLogoSqr = $options['aquila_new_logo_sqr']; 
		} else { 
			$aquilaNewLogoSqr = 'none'; 
		};

		echo "<style type='text/css'>
			body.folded #wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			body.folded #wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $aquilaNewLogoSqr . "')!important;
				background-size: contain;
		    background-repeat: no-repeat;
		    background-position: center center;
				margin: 20% 10%!important;
				max-width: 80%;
				height: 60%;
			}
		</style>";
	}
		 
	add_action( 'admin_bar_init', 'aquila_new_logo_sqr_admin', 83 ); 

}



?>