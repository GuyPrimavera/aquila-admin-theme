<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function aquila_admin_bar_links() {
  global $wp_admin_bar;
  $wp_admin_bar -> remove_menu('updates');
  $wp_admin_bar -> remove_menu('comments');
  $wp_admin_bar -> remove_menu('new-content');
  $wp_admin_bar -> remove_menu('vc_inline-admin-bar-link');
  $wp_admin_bar -> remove_menu('revslider');
  $wp_admin_bar -> remove_menu('customize');
  $wp_admin_bar -> remove_menu('themes');
  $wp_admin_bar -> remove_menu('widgets');
  $wp_admin_bar -> remove_menu('menus');
}
add_action('wp_before_admin_bar_render', 'aquila_admin_bar_links', 999);

// Remove "How are you"
function aquila_admin_bar_appearance() {
	global $wp_admin_bar;
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$adminUser = $current_user -> display_name;
	$avatar = get_avatar($user_id, 16);
	$wp_admin_bar -> add_menu(array(
		'id' => 'my-account',
		'title' => ' ' . $adminUser . $avatar )
	);
}
add_action('wp_before_admin_bar_render', 'aquila_admin_bar_appearance');
