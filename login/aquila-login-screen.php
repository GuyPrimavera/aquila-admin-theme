<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

if (empty($GLOBALS['aquilaLoginDisable']) || !$GLOBALS['aquilaLoginDisable']) {
	add_filter('login_headerurl', 'aquila_admin_login_logo_url');
	add_filter('login_headertext', 'aquila_admin_login_logo_title');
	add_action('login_head', 'aquila_new_logo_login', 90); 
	add_action('login_head', 'colourSchemeCSS');
	add_action('login_enqueue_scripts', 'aquila_global_load_style');
}

function aquila_admin_login_logo_url() {
	return home_url();
}

function aquila_admin_login_logo_title() {
	$site_title = get_bloginfo('name');
	return $site_title;
}

function aquila_new_logo_login() {
	$options = get_option('aquilaLogoSettings');
	if (!empty($options) && isset($GLOBALS['aquilaNewLogo'])) {
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
}
