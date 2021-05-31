<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

if (is_admin()) {
	add_action('admin_bar_menu', 'aquila_adminbar_title', 100);
}

function aquila_adminbar_title($admin_bar){
	$postType = false;
	$postType = get_current_screen() -> post_type;
	$adminTitle = false;
	$adminTitle = get_admin_page_title();
	if ($adminTitle !== false && $postType !== false && is_admin()) {
		$admin_bar -> add_menu(array(
			'id' => 'adminTitle',
			'title' => $adminTitle,
			'href' => '',
			'meta' => array(
				'title' => __($adminTitle),			
			),
		));
	}
}
