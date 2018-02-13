<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Add role to body

function aquila_admin_body_role($classes) {

	//global $current_user;
	//$userRole = array_shift($current_user->roles);

	$classes .= 'aquila aquilaAdmin';
	return $classes;

}
//add_filter('body_class','aquila_admin_body_role');
add_filter('admin_body_class', 'aquila_admin_body_role');


function aquila_front_body_class( $classes ) {

	
	if ( is_admin_bar_showing() ) {

		//global $current_user;
		//$userRole = array_shift($current_user->roles);
		
    $classes[] = 'aquila aquilaFront';
    return $classes;

  } else {

    $classes[] = ' ';
    return $classes;

  }

}
add_filter('body_class', 'aquila_front_body_class');

?>