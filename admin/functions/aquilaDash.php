<?php

function aquila_admin_menu_classes() 
{
	global $menu;

	foreach ((array) $menu as $key => $val) {
	//foreach ( $menu as $key => $val ) {
		if ( 'Dashboard' == $val[0] ) {
			$menu[$key][0] = 'Aquila';
			$menu[$key][6] = 'dashicons- aql-aquila';
		}
		//if ( 'Posts' == $val[0] ) {
			//$menu[$key][0] = 'Blog';
		//}
	}		
	
}

add_action( 'admin_init','aquila_admin_menu_classes' );

?>