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

?>