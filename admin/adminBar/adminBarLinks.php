<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Admin Bar links
$aquilaOptions = get_option( 'aquila_settings' );

if(isset($aquilaOptions['aquila_chk_abLinks']) && $aquilaOptions['aquila_chk_abLinks'] == 1){
    // do nothing
} else {
    add_action( 'admin_bar_menu', 'aquila_admin_bar_cleanup', 200 );
    function aquila_admin_bar_cleanup() 
    {
        global $wp_admin_bar;   
        if ( !is_object( $wp_admin_bar ) ) {
            return;
        }

        $nodes = $wp_admin_bar->get_nodes();
        $nodesKeep = array('wp-logo', 'site-name', 'adminTitle', 'screenOptions', 'contextHelp', 'menu-toggle', 'my-account', 'view', 'edit');

        foreach( $nodes as $node )
        {
            if( (!$node->parent || 'top-secondary' == $node->parent) && (!in_array($node->id, $nodesKeep)) ) {
                $wp_admin_bar->remove_menu( $node->id );
                //echo $node->id . '<br/>';
            }           
        }
    }
}

// Remove nodes
add_action( 'admin_bar_menu', 'aquila_remove_wp_logo_nodes', 999 );
function aquila_remove_wp_logo_nodes() {
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'about' );
    $wp_admin_bar->remove_node( 'wporg' );
    $wp_admin_bar->remove_node( 'documentation' );
    $wp_admin_bar->remove_node( 'support-forums' );
    $wp_admin_bar->remove_node( 'feedback' );
}

// Add Aquila links
add_action('admin_bar_menu', 'aquila_wp_logo_links', 100);
function aquila_wp_logo_links($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'pmsupport',
        'parent'=> 'wp-logo',
        'title' => __( 'Purple Manager', 'aquila-admin-theme' ),
        'href'  => 'https://purplemanager.com',
        'meta'  => array(
            'title' => __(''),
            'class' => __(''),
            'target' => __('_blank'),
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'pmsupport',
        'parent'=> 'wp-logo',
        'title' => __( 'Support', 'aquila-admin-theme' ),
        'href'  => 'https://support.sprylab.com/',
        'meta'  => array(
            'title' => __(''),
            'class' => __(''),
            'target' => __('_blank'),
        ),
    ));
}

?>