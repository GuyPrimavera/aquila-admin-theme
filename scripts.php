<?php 

function aquila_admin_load_style() {
	wp_register_style( 'aquila-admin-icons', plugins_url( 'aquila-admin-theme/icons/styles.css' ) );
	wp_enqueue_style( 'aquila-admin-icons' );
	wp_register_style( 'aquila-admin-style', plugins_url( 'aquila-admin-theme/css/aquila.css' ) );
	wp_enqueue_style( 'aquila-admin-style' );
}
add_action( 'admin_enqueue_scripts', 'aquila_admin_load_style' );
add_action( 'wp_head', 'aquila_admin_load_style', 99 );
add_action( 'login_enqueue_scripts', 'aquila_admin_load_style' );



?>