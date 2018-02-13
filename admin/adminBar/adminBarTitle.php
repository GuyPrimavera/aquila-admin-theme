<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

if ( is_admin() ) {
	add_action('admin_bar_menu', 'aquila_adminbar_title', 100);
}

function aquila_adminbar_title($admin_bar){

	$postType = false;
	$postType = get_current_screen()->post_type;
	$postTypeName = get_post_type_object( $postType );
	$adminTitle = false;
	$adminTitle = get_admin_page_title();

	if ($adminTitle !== false && $postType !== false && is_admin()) {

		$admin_bar->add_menu( array(
			'id'    => 'adminTitle',
			'title' => $adminTitle,
			'href'  => '',
			'meta'  => array(
				'title' => __($adminTitle),			
			),
		));

/*
		if 	($postType !== false) {

			$admin_bar->add_menu( array(
				'id'    => 'viewAll',
				'parent' => 'adminTitle', // Rename when ready for "Add new"
				'title' => 'All ' . $postTypeName->labels->name,
				'href'  => get_admin_url( ) . 'edit.php?post_type=' . $postType,
				'meta'  => array(
					'title' => __('My Sub Menu Item'),
					'target' => '_blank',
					'class' => 'my_menu_item_class'
				),
			));
			$admin_bar->add_menu( array(
				'id'    => 'my-second-sub-item',
				'parent' => 'adminTitle',
				'title' => 'New ' . $postTypeName->labels->singular_name,
				'href'  => get_admin_url( ) . 'post-new.php?post_type=' . $postType,
				'meta'  => array(
					'title' => __('My Second Sub Menu Item'),
					'target' => '_blank',
					'class' => 'my_menu_item_class'
				),
			));
		}
		*/
	}
}

?>