<?php

// Admin Bar links

function aquila_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('vc_inline-admin-bar-link');
    $wp_admin_bar->remove_menu('revslider');
    $wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_menu('themes');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_menu('menus');
		
}
add_action( 'wp_before_admin_bar_render', 'aquila_admin_bar_links', 999 );

?>