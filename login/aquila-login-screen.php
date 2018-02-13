<?php

function aquila_admin_login_logo() { ?>

<style type="text/css">
</style>

<?php

echo "<style type='text/css' media='screen'>
body.login {
	background-image: url( " . plugins_url( '../images/aqlHolding.jpg', __FILE__ ) . " )!important;
}
body.login div#login h1 a {
	background-image: url( " . plugins_url( '../images/aqlLogo.png', __FILE__ ) . " )!important;
}

     </style>
	 ";
	 
?>

<?php }
add_action( 'login_enqueue_scripts', 'aquila_admin_login_logo' ); 

function aquila_admin_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'aquila_admin_login_logo_url' );

function aquila_admin_login_logo_title() {
    return 'Aquila - design by Mito';
}
add_filter( 'login_headertitle', 'aquila_admin_login_logo_title' ); ?>