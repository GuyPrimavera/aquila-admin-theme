<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action('init', 'clean_output_buffer');
function clean_output_buffer() {
  ob_start();
}

// Custom Logo

$aquilaLogoSettings = get_option( 'aquilaLogoSettings' );
$aquilaNewLogo = $aquilaLogoSettings['aquila_new_logo'];
$aquilaNewLogoSqr = $aquilaLogoSettings['aquila_new_logo_sqr']; 

$GLOBALS['aquilaNewLogo'] = $aquilaNewLogo;
$GLOBALS['aquilaNewLogoSqr'] = $aquilaNewLogoSqr;

if( isset($aquilaLogoSettings['aquila_new_logo']) && $aquilaLogoSettings['aquila_new_logo'] !== "" ) {
	add_action( 'admin_head', 'aquila_new_logo_admin', 90); 
	add_action( 'wp_head', 'aquila_new_logo_admin', 90); 
	add_action( 'login_head', 'aquila_new_logo_login', 90 ); 
}

// Custom Logo (square)

if( isset($aquilaLogoSettings['aquila_new_logo_sqr']) && $aquilaLogoSettings['aquila_new_logo_sqr'] !== "" ) {
	add_action( 'admin_head', 'aquila_new_logo_sqr_admin', 90 ); 
	add_action( 'wp_head', 'aquila_new_logo_sqr_admin', 90 ); 
}

// Admin bar
function aquila_new_logo_admin() {

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
	    height: 80%;
	    top: 10%;
	    left: 10%;
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
			height: 80%;
			top: 10%;
			left: 10%;
		}		
	</style>";
}
	 

// Login screen
function aquila_new_logo_login() {

	echo "<style type='text/css'>
		body.login #login:before {
			display: none!important;
		}
		body.login #login h1 a {
			display: block!important;
		}
		body.login #login h1 a {
			background-image: url('" . $GLOBALS['aquilaNewLogo'] . "')!important;
			background-size: contain;
	    background-repeat: no-repeat;
	    background-position: center center;
	    width: auto;
	    height: 80px;
	    max-width: 350px;
		}
	</style>";
}

function aquila_new_logo_sqr_admin() {

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

?>