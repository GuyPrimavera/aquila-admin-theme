<?php

// Admin Bar links

$aquilaOptions = get_option( 'aquila_settings' );

if(isset($aquilaOptions['aquila_chk_abLinks']) && $aquilaOptions['aquila_chk_abLinks'] == 1){

} else {

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
        $wp_admin_bar->remove_menu('wpseo-menu');
        $wp_admin_bar->remove_menu('ngg-menu');
        $wp_admin_bar->remove_menu('w3tc');
        $wp_admin_bar->remove_menu('all-in-one-seo-pack');
        $wp_admin_bar->remove_menu('updraft_admin_node');
        $wp_admin_bar->remove_menu('itsec_admin_bar_menu');
    		
    }
    add_action( 'wp_before_admin_bar_render', 'aquila_admin_bar_links', 999 );

}

?>