<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

function aquila_admin_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'aquila_admin_login_logo_url' );

function aquila_admin_login_logo_title() {
    return 'Aquila';
}
add_filter( 'login_headertitle', 'aquila_admin_login_logo_title' ); 

?>