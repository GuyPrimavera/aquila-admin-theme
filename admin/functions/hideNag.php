<?php

//hide core updates notification in the dashboard

function aquila_admin_update_nag() {
    remove_action( 'admin_notices', 'update_nag', 3 ); //update notice at the top of the screen
    remove_filter( 'update_footer', 'core_update_footer' ); //update notice in the footer
}
add_action('admin_menu','aquila_admin_update_nag');

?>