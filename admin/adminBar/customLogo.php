<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action('init', 'clean_output_buffer');
function clean_output_buffer() {
  ob_start();
}

// Custom Logo
$aquilaLogoSettings = get_option( 'aquilaLogoSettings' );
$aquilaNewLogo = $aquilaLogoSettings['aquila_new_logo'] ?? 'none';
$aquilaNewLogoSqr = $aquilaLogoSettings['aquila_new_logo_sqr'] ?? 'none'; 

$GLOBALS['aquilaNewLogo'] = $aquilaNewLogo;
$GLOBALS['aquilaNewLogoSqr'] = $aquilaNewLogoSqr;

if( isset($aquilaLogoSettings['aquila_new_logo']) && $aquilaLogoSettings['aquila_new_logo'] !== "" ) {
	add_action( 'admin_head', 'aquila_new_logo_admin', 90); 
	add_action( 'wp_head', 'aquila_new_logo_admin', 90); 
}

// Custom Logo (square)
if( isset($aquilaLogoSettings['aquila_new_logo_sqr']) && $aquilaLogoSettings['aquila_new_logo_sqr'] !== "" ) {
	add_action( 'admin_head', 'aquila_new_logo_sqr_admin', 90 ); 
	add_action( 'wp_head', 'aquila_new_logo_sqr_admin', 90 ); 
}

// Admin bar
function aquila_new_logo_admin() {
	if ( is_admin_bar_showing() ) {
		echo "<style type='text/css'>
			#wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			#wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $GLOBALS['aquilaNewLogo'] . "')!important;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				margin: 0%!important;
				max-width: 80%;
				height: 70%;
				top: 15%;
				left: 10%;
			}
			#aquilaAdminbarIcon {
				background-image: url('" . $GLOBALS['aquilaNewLogoSqr'] . "')!important;
				background-size: 40px;
				background-repeat: no-repeat;
				background-position: center center;
			}
			#aquilaAdminbarIcon:before {
				display: none!important;
			}
			body.folded #wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			body.folded #wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $GLOBALS['aquilaNewLogoSqr'] . "')!important;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				margin: 0%!important;
				max-width: 80%;
				height: 70%;
				top: 15%;
				left: 10%;
			}		
		</style>";
	}
}

function aquila_new_logo_sqr_admin() {
	if ( is_admin_bar_showing() ) {
		echo "<style type='text/css'>
			body.folded #wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			body.folded #wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $GLOBALS['aquilaNewLogoSqr'] . "')!important;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				margin: 0%!important;
				max-width: 80%;
				height: 80%;
				top: 10%;
				left: 10%;
			}
		</style>";
	}
}

?>