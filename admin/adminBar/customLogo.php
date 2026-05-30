<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

add_action('init', 'clean_output_buffer');
function clean_output_buffer() {
  ob_start();
}

// Custom Logo
$aquilaLogoSettings = get_option('aquilaLogoSettings');
$aquilaNewLogo = isset($aquilaLogoSettings['aquila_new_logo']) ? esc_url_raw($aquilaLogoSettings['aquila_new_logo']) : '';
$aquilaNewLogoSqr = isset($aquilaLogoSettings['aquila_new_logo_sqr']) ? esc_url_raw($aquilaLogoSettings['aquila_new_logo_sqr']) : '';

$GLOBALS['aquilaNewLogo'] = $aquilaNewLogo;
$GLOBALS['aquilaNewLogoSqr'] = $aquilaNewLogoSqr;

if (isset($aquilaLogoSettings['aquila_new_logo']) && $aquilaLogoSettings['aquila_new_logo'] !== "") {
	add_action('admin_head', 'aquila_new_logo_admin', 90); 
	add_action('wp_head', 'aquila_new_logo_admin', 90); 
}

// Custom Logo (square)
if (isset($aquilaLogoSettings['aquila_new_logo_sqr']) && $aquilaLogoSettings['aquila_new_logo_sqr'] !== "") {
	add_action('admin_head', 'aquila_new_logo_sqr_admin', 90); 
	add_action('wp_head', 'aquila_new_logo_sqr_admin', 90); 
}

// Admin bar
function aquila_new_logo_admin() {
	if (is_admin_bar_showing()) {
		$logo_url = !empty($GLOBALS['aquilaNewLogo']) ? esc_url($GLOBALS['aquilaNewLogo']) : '';
		$logo_sqr_url = !empty($GLOBALS['aquilaNewLogoSqr']) ? esc_url($GLOBALS['aquilaNewLogoSqr']) : '';

		echo "<style type='text/css'>
			#wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			#wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $logo_url . "')!important;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				margin: 0%!important;
				max-width: 100%;
				height: 100%;
				top: 0;
				left: 0;
			}
			#aquilaAdminbarIcon {
				background-image: url('" . $logo_sqr_url . "')!important;
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
				background-image: url('" . $logo_sqr_url . "')!important;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				margin: 0%!important;
				max-width: 100%;
				height: 100%;
				top: 0;
				left: 0;
			}		
		</style>";
	}
}

function aquila_new_logo_sqr_admin() {
	if (is_admin_bar_showing()) {
		$logo_sqr_url = !empty($GLOBALS['aquilaNewLogoSqr']) ? esc_url($GLOBALS['aquilaNewLogoSqr']) : '';

		echo "<style type='text/css'>
			body.folded #wpadminbar li#wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				display: none!important;
			}
			body.folded #wpadminbar #wp-toolbar li#wp-admin-bar-wp-logo > .ab-item span.ab-icon {
				background-image: url('" . $logo_sqr_url . "')!important;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				margin: 0%!important;
				max-width: 100%;
				height: 100%;
				top: 0;
				left: 0;
			}
		</style>";
	}
}
