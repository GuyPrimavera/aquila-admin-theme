<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action('init', 'clean_output_buffer');
function clean_output_buffer() {
  ob_start();
}

// Custom Logo

$aquilaOptions = get_option( 'aquila_settings' );
$aquilaNewLogo = $aquilaOptions['aquila_new_logo'];
$aquilaNewLogoSqr = $aquilaOptions['aquila_new_logo_sqr']; 

$GLOBALS['aquilaNewLogo'] = $aquilaNewLogo;
$GLOBALS['aquilaNewLogoSqr'] = $aquilaNewLogoSqr;

if( isset($aquilaOptions['aquila_new_logo']) && $aquilaOptions['aquila_new_logo'] !== "" ) {
	add_action( 'admin_bar_init', 'aquila_new_logo_admin'); 
	add_action( 'login_head', 'aquila_new_logo_login' ); 
}

// Custom Logo (square)

if( isset($aquilaOptions['aquila_new_logo_sqr']) && $aquilaOptions['aquila_new_logo_sqr'] !== "" ) {
	add_action( 'admin_bar_init', 'aquila_new_logo_sqr_admin' ); 
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
	    margin: 5%!important;
	    max-width: 90%;
	    height: 60%;
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
			margin: 20% 10%!important;
			max-width: 80%;
			height: 60%;
		}
	</style>";
}

?>