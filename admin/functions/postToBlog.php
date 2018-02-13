<?php

function aquila_admin_post_to_blog() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    $submenu['edit.php'][16][0] = 'Blog Tags';
    echo '';
}
function aquila_admin_blog_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog Post';
    $labels->add_new = 'Add Blog Post';
    $labels->add_new_item = 'Add Blog Post';
    $labels->edit_item = 'Edit Blog Post';
    $labels->new_item = 'Blog Post';
    $labels->view_item = 'View Blog Post';
    $labels->search_items = 'Search Blog Posts';
    $labels->not_found = 'No Blog Posts found';
    $labels->not_found_in_trash = 'No Blog Posts found in Trash';
    $labels->all_items = 'All Blog Posts';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}
 
add_action( 'admin_menu', 'aquila_admin_post_to_blog' );
add_action( 'init', 'aquila_admin_blog_object' );

// Format meta box

function aquila_admin_blog_meta_boxes() {
    remove_meta_box( 'formatdiv' , 'post' , 'normal' ); 
    remove_meta_box( 'mymetabox_revslider_0' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'aquila_admin_blog_meta_boxes' );


?>