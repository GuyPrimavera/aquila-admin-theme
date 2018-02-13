<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Remove widgets

$aquilaOptions = get_option( 'aquila_settings' );

if(isset($aquilaOptions['aquila_chk_dashBoxes']) && $aquilaOptions['aquila_chk_dashBoxes'] == 1){

} else {

        function aquila_admin_remove_dashboard_meta() {
                remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
                remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
                remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
                remove_meta_box( 'ai_dashboard_widget', 'dashboard', 'normal' );
                remove_meta_box( 'welcome-panel', 'dashboard', 'normal' );
                remove_meta_box( 'dashboardb_range', 'dashboard', 'normal' );		
                remove_meta_box( 'sdf_dashboard_widget', 'dashboard', 'normal' );
                remove_action('welcome_panel', 'wp_welcome_panel');	
                remove_meta_box( 'authordiv', 'page', 'normal' );
        }
add_action( 'admin_init', 'aquila_admin_remove_dashboard_meta' );

        function remove_revslider_metabox($post_type) {
            add_action('do_meta_boxes', function () use ($post_type) {
                remove_meta_box('mymetabox_revslider_0', $post_type, 'normal');
            });
        }
        add_action('registered_post_type', 'remove_revslider_metabox');

}

?>