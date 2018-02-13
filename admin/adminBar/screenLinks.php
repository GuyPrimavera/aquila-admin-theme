<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action('admin_bar_menu', 'new_screenlinks', 100);
function new_screenlinks($admin_bar){

	$admin_bar->add_menu( array(
		'id'    => 'screenOptions',
		'title' => '',
		'href'  => '',
		'meta'  => array(
			'title' => __(''),			
			'class' => __('screenLink'),			
		),
	));

	$admin_bar->add_menu( array(
		'id'    => 'contextHelp',
		'title' => '',
		'href'  => '',
		'meta'  => array(
			'title' => __(''),			
			'class' => __('screenLink'),			
		),
	));



}

?>