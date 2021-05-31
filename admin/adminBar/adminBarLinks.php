<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

// Admin Bar links
if (!isset($GLOBALS['aquilaShowAdminbarLinks']) || !$GLOBALS['aquilaShowAdminbarLinks']) {
  function aquila_admin_bar_cleanup() {
    global $wp_admin_bar;
    if (!is_object($wp_admin_bar)) {
      return;
    }

    $nodes = $wp_admin_bar -> get_nodes();
    $nodesKeep = array(
      'wp-logo', 
      'site-name', 
      'adminTitle', 
      'screenOptions', 
      'contextHelp', 
      'menu-toggle', 
      'my-account', 
      'view', 
      'edit'
    );

    foreach($nodes as $node) {
      if((!$node->parent || 'top-secondary' == $node -> parent) && (!in_array($node -> id, $nodesKeep))) {
        $wp_admin_bar->remove_menu($node->id);
      }
    }
  }
  add_action('admin_bar_menu', 'aquila_admin_bar_cleanup', 200);
}

// Remove nodes
add_action('admin_bar_menu', 'aquila_remove_wp_logo_nodes', 999);
function aquila_remove_wp_logo_nodes() {
  global $wp_admin_bar;
  $wp_admin_bar -> remove_node('about');
  $wp_admin_bar -> remove_node('wporg');
  $wp_admin_bar -> remove_node('documentation');
  $wp_admin_bar -> remove_node('support-forums');
  $wp_admin_bar -> remove_node('feedback');
}

// Add Aquila links
if (!isset($GLOBALS['aquilaHideLogoMenu']) || !$GLOBALS['aquilaHideLogoMenu']) {
    add_action('admin_bar_menu', 'aquila_wp_logo_links', 100);
}
function aquila_wp_logo_links($admin_bar){
  $admin_bar->add_menu(array(
    'id' => 'wpLessons',
    'parent' => 'wp-logo',
    'title' => __('WordPress Lessons', 'aquila-admin-theme'),
    'href' => 'https://wordpress.org/support/article/wordpress-lessons/',
    'meta' => array(
      'title' => __(''),
      'class' => __(''),
      'target' => __('_blank'),
    ),
  ));
  $admin_bar->add_menu(array(
    'id' => 'wpGuide',
    'parent' => 'wp-logo',
    'title' => __('WordPress User Guide', 'aquila-admin-theme'),
    'href' => 'http://easywpguide.com/wordpress-manual/',
    'meta' => array(
      'title' => __(''),
      'class' => __(''),
      'target' => __('_blank'),
    ),
  ));
  $admin_bar->add_menu(array(
    'id' => 'mitoSupport',
    'parent' => 'wp-logo-external',
    'title' => __('Aquila Support', 'aquila-admin-theme'),
    'href' => 'https://wordpress.org/support/plugin/aquila-admin-theme/#new-post',
    'meta' => array(
      'title' => __(''),
      'class' => __(''),
      'target' => __('_blank'),
    ),
  ));
}
