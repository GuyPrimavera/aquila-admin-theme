<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

$aquilaOptions = get_option( 'aquila_settings' );

if(isset($aquilaOptions['aquila_chk_postBlog']) && $aquilaOptions['aquila_chk_postBlog'] == 1){

} else {

    function aquila_admin_post_to_blog() {
        global $menu;
        //global $submenu;

        if (isset($menu[5][5]) && $menu[5][5] === "menu-posts" && current_user_can("edit_posts")) {
            $menu[5][0] = 'Blog';
            $submenu['edit.php'][5][0] = __( 'Blog', 'aquila-admin-theme' );
            $submenu['edit.php'][10][0] = __( 'Add Blog Post', 'aquila-admin-theme' );
            $submenu['edit.php'][16][0] = __( 'Blog Tags', 'aquila-admin-theme' );
            echo '';
        } // Thanks Aaron Queen

    }
    function aquila_admin_blog_object() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = __( 'Blog', 'aquila-admin-theme' );
        $labels->singular_name = __( 'Blog Post', 'aquila-admin-theme' );
        $labels->add_new = __( 'Add Blog Post', 'aquila-admin-theme' );
        $labels->add_new_item = __( 'Add Blog Post', 'aquila-admin-theme' );
        $labels->edit_item = __( 'Edit Blog Post', 'aquila-admin-theme' );
        $labels->new_item = __( 'Blog Post', 'aquila-admin-theme' );
        $labels->view_item = __( 'View Blog Post', 'aquila-admin-theme' );
        $labels->search_items = __( 'Search Blog Posts', 'aquila-admin-theme' );
        $labels->not_found = __( 'No Blog Posts found', 'aquila-admin-theme' );
        $labels->not_found_in_trash = __( 'No Blog Posts found in Trash', 'aquila-admin-theme' );
        $labels->all_items = __( 'All Blog Posts', 'aquila-admin-theme' );
        $labels->menu_name = __( 'Blog', 'aquila-admin-theme' );
        $labels->name_admin_bar = __( 'Blog', 'aquila-admin-theme' );
    }
     
    add_action( 'admin_menu', 'aquila_admin_post_to_blog' );
    add_action( 'init', 'aquila_admin_blog_object' );

}

// Format meta box

function aquila_admin_blog_meta_boxes() {
    remove_meta_box( 'formatdiv' , 'post' , 'normal' ); 
    remove_meta_box( 'mymetabox_revslider_0' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'aquila_admin_blog_meta_boxes' );


?>