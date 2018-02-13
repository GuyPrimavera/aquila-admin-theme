<?php 
if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

/// Global scripts

function aquila_global_load_style() {

	if ( is_admin_bar_showing() ) {

		wp_register_style( 'aquila-admin-icons', plugins_url( 'aquila-admin-theme/icons/style.css' ) );
		wp_enqueue_style( 'aquila-admin-icons' );

		wp_register_style( 'aquila-adminBar-style', plugins_url( 'aquila-admin-theme/css/adminBar.css' ) );
		wp_enqueue_style( 'aquila-adminBar-style' );

		wp_register_script( 'calls', plugins_url( '/js/calls.js', __FILE__ ) );
		wp_enqueue_script( 'calls' );

	}

}
add_action( 'admin_enqueue_scripts', 'aquila_global_load_style' );
add_action( 'wp_head', 'aquila_global_load_style', 99 );
add_action( 'login_enqueue_scripts', 'aquila_global_load_style' );


/// Admin scripts

function aquila_admin_load_style() {

	wp_register_style( 'aquila-admin-style', plugins_url( 'aquila-admin-theme/css/aquila.css' ) );
	wp_enqueue_style( 'aquila-admin-style' );

	//wp_register_style( 'irisCss', plugins_url( '/css/iris.min.css', __FILE__ ) );
	//wp_enqueue_style( 'irisCss' );

	//wp_enqueue_script("jquery-effects-core");
	//wp_enqueue_script('jquery-ui-core');

	//wp_register_script( 'irisJs', plugins_url( '/js/iris.js', __FILE__ ) );
	//wp_enqueue_script( 'irisJs' );

	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');


	if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
	} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	}

}
add_action( 'admin_enqueue_scripts', 'aquila_admin_load_style', 99 );


/// Login scripts

function aquila_login_load_style() {

	wp_register_style( 'aquila-admin-icons', plugins_url( 'aquila-admin-theme/icons/style.css' ) );
	wp_enqueue_style( 'aquila-admin-icons' );

	wp_register_style( 'aquila-login-style', plugins_url( 'aquila-admin-theme/css/login.css' ) );
	wp_enqueue_style( 'aquila-login-style' );

}
add_action( 'login_enqueue_scripts', 'aquila_login_load_style' );


/// i18n

function aquila_i18n_setup() {
  $locale = apply_filters( 'plugin_locale', get_locale(), 'aquila-admin-theme' );
  load_textdomain( 'aquila-admin-theme', WP_LANG_DIR . "/aquila-admin-theme-$locale.mo" );
	load_plugin_textdomain( 'aquila-admin-theme', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'aquila_i18n_setup' );

?>