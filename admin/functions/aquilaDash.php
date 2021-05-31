<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function aquila_admin_menu_classes() {
	global $menu;
	foreach ((array) $menu as $key => $val) {
		if ($val[0] == 'Dashboard') {
			$menu[$key][0] = 'Aquila';
			$menu[$key][6] = 'dashicons- aql-aquila';
		}
	}	
}
add_action('admin_init','aquila_admin_menu_classes');
